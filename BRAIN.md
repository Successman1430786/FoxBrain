# FoxBrain ERP — BRAIN.md

## Master Business & Technical Specification

**Project:** FoxBrain ERP
**Company:** FoxBrain Pvt. Ltd.
**Platform:** Sales Management + School Education ERP
**Backend:** PHP / Laravel
**Database:** MySQL
**Frontend:** Blade / Bootstrap 5 / JavaScript
**Status:** Active Development

---

# 1. Purpose of This Document

`BRAIN.md` is the internal master specification for the FoxBrain ERP project.

It defines:

* Business objectives
* System architecture
* Business workflows
* User roles
* Portal responsibilities
* Module boundaries
* Database concepts
* Entity relationships
* Business rules
* RBAC
* Data access rules
* Security requirements
* Validation rules
* Development standards
* Testing requirements
* Future API/mobile requirements
* Development roadmap

## Core Rule

> **Do not implement a major feature without first checking whether its business rules, relationships, permissions, and workflow are defined here.**

`README.md` explains the project to developers.

`BRAIN.md` explains **how the system is supposed to work**.

---

# 2. Product Definition

FoxBrain ERP is a centralized platform for FoxBrain Pvt. Ltd. that combines:

```text
                    FOXBRAIN ERP
                         │
          ┌──────────────┴──────────────┐
          │                             │
          ▼                             ▼
   SALES MANAGEMENT                SCHOOL ERP
          │                             │
          │                             ├── Admin
          │                             ├── Coordinators
          │                             ├── Students
          │                             └── Parents
          │
          ├── Sales Team
          ├── Leads
          ├── Follow-ups
          ├── Activities
          ├── Proposals
          └── School Onboarding
```

The system must maintain a common data foundation so that information does not need to be entered repeatedly.

---

# 3. Main Business Objective

The ERP should manage two connected business areas.

## 3.1 Sales Business

The Sales Team manages:

```text
Lead
  ↓
Contact
  ↓
Qualification
  ↓
Follow-up
  ↓
Requirement
  ↓
Proposal / Quotation
  ↓
Negotiation
  ↓
Won
  ↓
School Onboarding
```

## 3.2 Education Business

After onboarding:

```text
School
  ↓
Program
  ↓
Coordinator
  ↓
Class / Batch
  ↓
Students
  ↓
Parents
  ↓
Attendance
  ↓
Assignments / Activities
  ↓
Examinations
  ↓
Results
  ↓
Fees
  ↓
Reports
```

The two workflows must remain connected.

---

# 4. Core System Principle

The ERP is not simply a collection of CRUD modules.

Every module must represent a real FoxBrain business process.

For every feature, determine:

1. Business purpose
2. User/role
3. Workflow
4. Required entities
5. Relationships
6. Validation
7. Authorization
8. Failure handling
9. Audit requirements
10. Reporting requirements
11. Future API requirements
12. Future mobile requirements

---

# 5. System Architecture

The initial architecture follows Laravel's MVC pattern with additional service and policy layers.

```text
Browser
   │
   ▼
Routes
   │
   ▼
Middleware
   │
   ▼
Authorization / Policies
   │
   ▼
Controllers
   │
   ▼
Form Requests
   │
   ▼
Services / Business Logic
   │
   ▼
Models / Eloquent
   │
   ▼
MySQL
```

Supporting layers:

```text
Services
Policies
Requests
Models
Events
Notifications
Jobs
Reports
Audit Logs
```

---

# 6. Architectural Principles

## 6.1 Separation of Responsibilities

Controllers should not contain large amounts of business logic.

Use:

```text
Controller
    ↓
Request Validation
    ↓
Service
    ↓
Model
```

## 6.2 Authorization

Authorization must be enforced before sensitive operations.

Use:

* Middleware
* Policies
* Permission checks
* Ownership checks
* Organizational scope checks

## 6.3 Validation

Validation belongs primarily in Form Request classes.

Examples:

```text
StoreLeadRequest
UpdateLeadRequest

StoreSchoolRequest
UpdateSchoolRequest

StoreStudentRequest
UpdateStudentRequest
```

## 6.4 Reusable Business Logic

Business logic that is shared by controllers, jobs, commands, or APIs should be placed in services.

---

# 7. User Roles

Initial roles:

```text
Super Admin
Admin
Sales Manager
Sales Executive
Coordinator
Student
Parent
```

Future roles:

```text
Teacher
Trainer
Accountant
HR
Management
School Administrator
```

Roles must not be hard-coded into controllers.

Permissions determine what users can do.

---

# 8. Portal Architecture

The application contains separate functional portals.

```text
FoxBrain ERP
│
├── Admin Portal
│
├── Sales Portal
│
├── Coordinator Portal
│
├── Student Portal
│
└── Parent Portal
```

Each portal should have:

* Dedicated dashboard
* Navigation
* Permissions
* Data scope
* Relevant reports
* Relevant actions

---

# 9. Super Admin

Super Admin has the highest system-level access.

Responsibilities:

* System configuration
* User management
* Role management
* Permission management
* All modules
* System settings
* Audit logs
* Security administration

Super Admin access must still be logged.

---

# 10. Admin Portal

Admin manages the overall ERP operation.

## Modules

```text
Dashboard
Users
Roles
Permissions
Sales
Schools
Coordinators
Students
Parents
Programs
Academic
Attendance
Examinations
Fees
Communication
Reports
Settings
Activity Logs
```

Admin permissions should be configurable.

---

# 11. Sales Portal

The Sales Portal is designed specifically for the FoxBrain Sales Team.

## Main Modules

```text
Dashboard
Leads
Schools / Prospects
Contacts
Follow-ups
Activities
Proposals
Quotations
Deals
Tasks
Reports
```

---

# 12. Sales Team Management

A sales employee should have:

```text
User
Employee Profile
Sales Role
Manager
Status
Assigned Leads
Activities
Follow-ups
Deals
```

Possible statuses:

```text
Active
Inactive
On Leave
Suspended
```

---

# 13. Lead Management

A lead represents a potential business opportunity.

## Lead Data

Minimum conceptual fields:

```text
Lead ID
Organization / School Name
Contact Person
Phone
Email
Address
City
State
Lead Source
School Type
Student Strength
Required Program
Priority
Status
Assigned Sales User
Created By
Created At
Updated At
```

---

# 14. Lead Sources

Initial sources:

```text
Website
Phone
WhatsApp
Email
School Visit
Reference
Social Media
Exhibition
Advertisement
Other
```

Lead sources should be database-driven rather than hard-coded where practical.

---

# 15. Lead Status Lifecycle

Default lifecycle:

```text
NEW
 ↓
CONTACTED
 ↓
QUALIFIED
 ↓
REQUIREMENT_COLLECTED
 ↓
PROPOSAL_SENT
 ↓
NEGOTIATION
 ↓
WON
```

Alternative outcomes:

```text
LOST
ON_HOLD
NOT_INTERESTED
FUTURE_OPPORTUNITY
```

A status transition should be validated.

Example:

```text
NEW → CONTACTED
CONTACTED → QUALIFIED
QUALIFIED → REQUIREMENT_COLLECTED
REQUIREMENT_COLLECTED → PROPOSAL_SENT
PROPOSAL_SENT → NEGOTIATION
NEGOTIATION → WON
NEGOTIATION → LOST
```

---

# 16. Lead Ownership

Every active lead should have an assigned sales employee.

Rules:

* Sales Executive sees assigned leads.
* Sales Manager sees team leads.
* Admin sees leads according to permissions.
* Super Admin can access all leads.

Lead reassignment must create an audit record.

---

# 17. Lead Activities

Activities record interaction with a lead.

Types:

```text
Call
Meeting
School Visit
Email
WhatsApp
Demo
Presentation
Requirement Discussion
Other
```

Activity information:

```text
Lead
User
Activity Type
Date
Subject
Description
Outcome
Next Action
Next Follow-up Date
Attachment
```

---

# 18. Follow-up Management

Follow-ups are separate business records.

Each follow-up contains:

```text
Lead
Assigned User
Date
Time
Type
Purpose
Notes
Status
Next Follow-up
```

Statuses:

```text
Pending
Completed
Cancelled
Rescheduled
Missed
```

The Sales Dashboard should highlight:

```text
Today's Follow-ups
Overdue Follow-ups
Upcoming Follow-ups
Completed Follow-ups
```

---

# 19. Proposal & Quotation Management

A proposal/quotation may contain:

```text
Proposal Number
Lead / School
Programs
Items
Quantity
Unit Price
Discount
Tax
Total
Validity
Terms
Notes
Status
Created By
```

Statuses:

```text
Draft
Sent
Viewed
Negotiation
Accepted
Rejected
Expired
Cancelled
```

Every important status change should be logged.

---

# 20. Deal Management

A deal represents a confirmed sales opportunity.

Conceptual workflow:

```text
Lead
 ↓
Qualified
 ↓
Proposal
 ↓
Negotiation
 ↓
Deal Won
 ↓
School Onboarding
```

A Won Deal should not automatically mean that every school setup is complete.

Instead:

```text
Deal Won
   ↓
Onboarding Required
   ↓
School Setup
   ↓
Program Setup
   ↓
Coordinator Assignment
   ↓
Student Enrollment
```

---

# 21. School Management

A school is an organization/client associated with FoxBrain.

School data includes:

```text
School Name
School Code
School Type
Address
City
State
Contact Information
Principal / Representative
Student Capacity
Status
Onboarding Date
Programs
Documents
```

Possible status:

```text
Prospect
Onboarding
Active
Inactive
Completed
Suspended
```

---

# 22. School Contacts

A school can have multiple contacts.

Examples:

```text
Principal
Director
School Coordinator
IT Contact
Accounts Contact
Other
```

Do not assume that a school has only one contact.

Relationship:

```text
School
 ├── Contact 1
 ├── Contact 2
 └── Contact 3
```

---

# 23. School Onboarding

School onboarding is a controlled workflow.

```text
Deal Won
   ↓
School Created
   ↓
Documents
   ↓
Agreement
   ↓
Program Setup
   ↓
Coordinator Assignment
   ↓
Academic Setup
   ↓
Student Enrollment
   ↓
School Active
```

Onboarding status should be trackable.

---

# 24. Program Management

Programs represent FoxBrain's educational offerings.

Examples:

```text
Robotics
STEM
Coding
Artificial Intelligence
IoT
Arduino
Python
App Development
Electronics
Innovation
```

A program may contain:

```text
Name
Code
Description
Duration
Curriculum
Level
Status
Fee Configuration
```

---

# 25. Coordinator Management

A coordinator manages assigned educational operations.

A coordinator may be assigned to:

```text
School
Program
Class
Batch
Students
```

Coordinator permissions must be limited to assigned operational scope unless broader permission exists.

---

# 26. Student Management

Student is a core entity.

Student information:

```text
Student ID
Admission Number
Name
Date of Birth
Gender
Contact
School
Academic Year
Class
Section
Batch
Program
Enrollment Date
Status
```

Possible status:

```text
Active
Inactive
Transferred
Completed
Dropped
Suspended
```

---

# 27. Student Enrollment

Student enrollment must maintain historical information.

Do not overwrite old academic assignments without preserving history.

Conceptually:

```text
Student
   ↓
Enrollment
   ↓
Academic Year
   ↓
School
   ↓
Program
   ↓
Class
   ↓
Section
   ↓
Batch
```

This allows the system to answer:

* Which school did the student belong to?
* Which program?
* Which class?
* Which academic year?
* Which batch?

---

# 28. Parent Management

Parents are separate entities from users.

A parent may have one or more children.

```text
Parent
  │
  ├── Student A
  ├── Student B
  └── Student C
```

Parent information:

```text
Parent ID
Name
Phone
Email
Address
Relationship
Occupation
Status
```

---

# 29. Parent-Student Relationship

Do not store only `parent_id` on students if the business may support multiple guardians.

Use a relationship table.

Concept:

```text
parents
students
parent_student
```

Relationship may contain:

```text
Parent
Student
Relationship Type
Is Primary Guardian
Is Emergency Contact
Can Access Portal
```

---

# 30. Student Portal

Students can access:

```text
Dashboard
Profile
School
Program
Class
Section
Batch
Attendance
Assignments
Homework
Activities
Examinations
Results
Report Cards
Fees
Notices
Notifications
```

Students must only see their own records.

---

# 31. Parent Portal

Parents can access:

```text
Dashboard
Children
Student Profile
School
Program
Class
Attendance
Assignments
Examinations
Results
Report Cards
Fees
Payments
Receipts
Notices
Notifications
```

Parent access must always be verified through the parent-student relationship.

Never trust a student ID supplied directly by the browser.

---

# 32. Child Selection

If a parent has multiple children:

```text
Parent Login
      ↓
Children
      ↓
Select Child
      ↓
Verify Parent-Student Relationship
      ↓
Display Child Data
```

Every child-specific request must verify ownership.

---

# 33. Academic Structure

Core hierarchy:

```text
School
   ↓
Academic Year
   ↓
Class
   ↓
Section
   ↓
Batch
   ↓
Students
```

Programs may operate across multiple classes/batches.

---

# 34. Academic Year

Academic year is a major organizational boundary.

Example:

```text
2026-27
2027-28
2028-29
```

Rules:

* Only one current academic year per applicable school/system scope.
* Historical academic years must remain available.
* Students should retain enrollment history.
* Reports should be filterable by academic year.

---

# 35. Class Management

Class examples:

```text
Class 3
Class 4
Class 5
...
Class 12
```

Classes should not be confused with programs.

Example:

```text
Class 6
   ├── Robotics
   ├── Coding
   └── STEM
```

---

# 36. Section Management

A class may contain:

```text
Class 6
 ├── Section A
 ├── Section B
 └── Section C
```

Sections should belong to an appropriate class and academic year.

---

# 37. Batch Management

A batch is useful when FoxBrain's program delivery requires smaller groups.

Example:

```text
Class 6
   ↓
Robotics
   ↓
Batch A
Batch B
Batch C
```

A batch can have:

* Program
* School
* Academic year
* Class
* Trainer/Coordinator
* Students
* Schedule

---

# 38. Attendance Management

Attendance belongs to an academic context.

Concept:

```text
Attendance
 ├── Student
 ├── Date
 ├── Batch/Class
 ├── Status
 ├── Marked By
 └── Remarks
```

Statuses:

```text
Present
Absent
Late
Leave
Holiday
```

Duplicate attendance records for the same student/context/date must be prevented.

---

# 39. Assignment Management

Assignments may belong to:

```text
School
Program
Class
Batch
Subject / Activity
```

Assignment information:

```text
Title
Description
Instructions
Created By
Published Date
Due Date
Attachment
Status
```

---

# 40. Student Submission

Where required:

```text
Assignment
   ↓
Student
   ↓
Submission
   ↓
Evaluation
   ↓
Marks / Grade
   ↓
Remarks
```

Students should only be able to submit their own work.

---

# 41. Examination Management

Examination concepts:

```text
Examination
Exam Schedule
Assessment
Marks
Grade
Result
Report Card
```

An examination may belong to an academic year and academic scope.

---

# 42. Result Management

Results should maintain:

```text
Student
Examination
Subject / Skill
Maximum Marks
Obtained Marks
Grade
Remarks
```

Results should be immutable after publishing unless an authorized correction workflow exists.

---

# 43. Result Correction

If results need correction:

```text
Published Result
      ↓
Correction Request
      ↓
Authorization
      ↓
Correction
      ↓
Audit Log
```

Never silently modify published results.

---

# 44. Fee Management

Finance must support:

```text
Fee Type
Fee Structure
Student Fee
Payment
Receipt
Discount
Scholarship
Outstanding
```

Concept:

```text
Fee Structure
      ↓
Student Fee
      ↓
Discount
      ↓
Payable
      ↓
Payment
      ↓
Outstanding
```

---

# 45. Payment Rules

Every payment should have:

```text
Payment ID
Receipt Number
Student
School
Fee
Amount
Payment Date
Payment Method
Transaction Reference
Collected By
Status
```

Payment methods may include:

```text
Cash
UPI
Bank Transfer
Card
Online Payment
Other
```

Financial records must not be deleted casually.

Use reversal/refund/correction workflows where required.

---

# 46. Communication

Communication modules:

```text
Notices
Announcements
Notifications
Messages
Email
Future SMS
Future WhatsApp
Future Push Notifications
```

Messages should maintain sender, recipient, timestamp, and status.

---

# 47. Notification Architecture

Notifications should be designed for multiple delivery channels.

```text
Notification
     │
     ├── Web
     ├── Email
     ├── Push
     ├── SMS
     └── WhatsApp
```

The initial implementation may support web notifications and email while keeping the architecture extensible.

---

# 48. Dashboard Architecture

Dashboards should be role-specific.

## Admin

```text
Schools
Students
Parents
Coordinators
Sales
Leads
Attendance
Fees
Reports
```

## Sales

```text
Leads
Follow-ups
Activities
Proposals
Deals
Schools
```

## Coordinator

```text
Schools
Students
Batches
Attendance
Activities
Progress
```

## Student

```text
Attendance
Assignments
Results
Fees
Notifications
```

## Parent

```text
Children
Attendance
Results
Fees
Notifications
```

---

# 49. RBAC Architecture

Roles and permissions must remain independent.

Concept:

```text
User
 ↓
Role
 ↓
Permissions
```

Example:

```text
Sales Executive
 ├── leads.view
 ├── leads.create
 ├── leads.edit
 ├── followups.view
 └── followups.create
```

---

# 50. Permission Naming Convention

Use:

```text
module.action
```

Examples:

```text
users.view
users.create
users.edit
users.delete

leads.view
leads.create
leads.edit
leads.delete

schools.view
schools.create
schools.edit
schools.delete

students.view
students.create
students.edit
students.delete

parents.view
parents.create
parents.edit
parents.delete

attendance.view
attendance.create
attendance.edit

fees.view
fees.create
fees.edit
```

---

# 51. Data Scope

Permissions alone are not sufficient.

The system also needs record-level scope.

Example:

```text
Sales Executive
    ↓
Assigned Leads

Coordinator
    ↓
Assigned Schools
    ↓
Assigned Students

Student
    ↓
Own Records

Parent
    ↓
Linked Children
```

This prevents users from accessing records simply by changing an ID in the URL.

---

# 52. Authorization Rules

Authorization should be enforced at multiple levels.

```text
Route
 ↓
Middleware
 ↓
Permission
 ↓
Policy
 ↓
Data Scope
```

Example:

```text
/student/25
```

must not display student 25 merely because the URL exists.

The application must verify:

```text
Authenticated?
Permission?
Correct role?
Correct organizational scope?
Own record / assigned record?
```

---

# 53. Security Requirements

Required security practices:

* Password hashing
* CSRF protection
* Authentication
* Authorization
* Policies
* Form validation
* SQL parameter binding
* Eloquent ORM
* Mass assignment protection
* Session security
* File validation
* Rate limiting where appropriate
* Secure password reset
* Audit logging
* Access control
* Secure file storage

---

# 54. Sensitive Data

The system may contain:

* Student information
* Parent information
* Contact information
* Academic records
* Attendance
* Financial records
* Internal sales information

Access must be limited according to role and business scope.

---

# 55. Audit Logging

Important actions should be recorded.

Examples:

```text
Login
Logout
Create
Update
Delete
Role Change
Permission Change
Lead Assignment
Lead Status Change
School Onboarding
Student Enrollment
Fee Payment
Result Publication
Result Correction
```

Audit data should include:

```text
User
Action
Module
Record
Old Value
New Value
IP Address
User Agent
Timestamp
```

---

# 56. Soft Delete Policy

Soft deletes should be considered for business records where historical information is important.

Potential candidates:

```text
Users
Schools
Students
Parents
Leads
Programs
```

However, financial transactions, audit logs, and other immutable records should not be treated as ordinary deletable CRUD records.

---

# 57. Database Design Principles

Use:

* Singular model names
* Plural snake_case table names
* Foreign keys
* Appropriate indexes
* Unique constraints
* Composite unique constraints
* Timestamps
* Soft deletes where justified

Avoid:

* Duplicate data
* Unnecessary JSON storage
* Hard-coded business relationships
* Missing foreign keys
* Unindexed high-volume lookup columns

---

# 58. Important Relationships

Core relationships:

```text
User
 ├── Role
 └── Employee / Profile

Sales User
 ├── Leads
 ├── Activities
 └── Follow-ups

Lead
 ├── Activities
 ├── Follow-ups
 ├── Proposals
 └── School

School
 ├── Contacts
 ├── Programs
 ├── Coordinators
 ├── Students
 └── Academic Structure

Student
 ├── Parents
 ├── Enrollments
 ├── Attendance
 ├── Assignments
 ├── Results
 └── Fees

Parent
 └── Students
```

---

# 59. Transaction Management

Use database transactions for operations that modify multiple related records.

Example:

```text
Convert Lead to School
        ↓
Create School
        ↓
Create Contact
        ↓
Create Program Assignment
        ↓
Update Lead
        ↓
Create Audit Log
```

If one critical operation fails, the transaction should roll back.

---

# 60. Lead Conversion

Lead conversion must be handled carefully.

Possible process:

```text
Qualified Lead
      ↓
Confirm Conversion
      ↓
Create / Match School
      ↓
Create Contact
      ↓
Create Deal
      ↓
Update Lead
      ↓
Create Audit
```

The system must prevent accidental duplicate schools.

---

# 61. Student Enrollment Transactions

Enrollment may involve:

```text
Student
Parent
Enrollment
School
Program
Class
Section
Batch
User Account
```

If several records must be created together, use a transaction.

---

# 62. Duplicate Prevention

The system should detect duplicates for:

### Leads

Potential duplicate based on:

```text
School Name
Phone
Email
```

### Schools

Potential duplicate based on:

```text
School Name
Registration Information
Phone
Email
```

### Students

Potential duplicate based on appropriate combinations such as:

```text
Admission Number
Student Identifier
School
Academic Year
```

Do not rely on a single field unless the business guarantees uniqueness.

---

# 63. File Management

Documents may be attached to:

```text
Leads
Schools
Students
Parents
Proposals
Assignments
Payments
```

Files must:

* Be validated
* Have controlled MIME types
* Have controlled size
* Use secure storage
* Avoid executable uploads
* Have authorization checks
* Not expose private files directly

---

# 64. Reporting Architecture

Reports should use dedicated query logic where necessary rather than loading large datasets into memory.

Reports should support:

```text
Date Range
School
Academic Year
Program
Class
Section
Batch
Sales Employee
Coordinator
Status
```

Export formats may include:

```text
CSV
Excel
PDF
```

where required.

---

# 65. Search & Filtering

Major listing pages should support:

* Search
* Filters
* Sorting
* Pagination

Examples:

```text
Students
Leads
Schools
Parents
Payments
Attendance
Results
```

Search should be database-efficient.

---

# 66. API Readiness

The ERP should be designed so future APIs can reuse business logic.

Preferred architecture:

```text
Web Controller
      ↓
Service
      ↓
Model

API Controller
      ↓
Service
      ↓
Model
```

Business logic should not exist only inside Blade views or web controllers.

---

# 67. Future Mobile Applications

Potential applications:

```text
Parent App
Student App
Coordinator App
Teacher App
Sales App
```

The web ERP should therefore maintain clean API-compatible business services.

---

# 68. Events & Notifications

Events can be used for important business actions.

Examples:

```text
LeadCreated
LeadAssigned
LeadStatusChanged
DealWon
SchoolOnboarded
StudentEnrolled
PaymentReceived
ResultPublished
NoticePublished
```

Listeners may handle:

```text
Notifications
Emails
Audit Logs
Reports
Integrations
```

---

# 69. Queues & Background Jobs

Use queues for potentially slow operations.

Examples:

```text
Bulk Email
Report Generation
PDF Generation
Notification Delivery
Large Imports
Data Exports
Future WhatsApp/SMS
```

Do not make users wait unnecessarily for long-running processes.

---

# 70. Testing Strategy

Testing should include:

## Unit Tests

Business logic.

## Feature Tests

Complete application workflows.

## Authorization Tests

Ensure unauthorized users cannot access protected data.

## Integration Tests

Verify modules work together.

---

# 71. Critical Security Tests

Must test scenarios such as:

```text
Parent accessing another child's data
Student accessing another student's profile
Sales employee accessing another employee's lead
Coordinator accessing another school's students
Unauthorized user editing fees
Unauthorized user modifying results
User changing IDs in URLs
```

These are mandatory security scenarios.

---

# 72. Critical Business Tests

Test:

```text
Lead creation
Lead assignment
Follow-up creation
Lead conversion
School onboarding
Student enrollment
Parent-child linking
Attendance creation
Fee payment
Result publishing
Notification delivery
```

---

# 73. Development Naming Standards

## Models

```text
User
Role
Permission
Lead
School
Student
Parent
Coordinator
Program
AcademicYear
SchoolClass
Section
Batch
Attendance
Assignment
Examination
Result
Fee
Payment
```

## Tables

```text
users
roles
permissions
leads
schools
students
parents
coordinators
programs
academic_years
classes
sections
batches
attendances
assignments
examinations
results
fees
payments
```

---

# 74. Controller Standards

Controllers should be resource-oriented.

Example:

```text
LeadController
SchoolController
StudentController
ParentController
CoordinatorController
ProgramController
AttendanceController
FeeController
```

Do not create huge controllers containing unrelated modules.

---

# 75. Request Standards

Use:

```text
StoreLeadRequest
UpdateLeadRequest

StoreSchoolRequest
UpdateSchoolRequest

StoreStudentRequest
UpdateStudentRequest

StoreParentRequest
UpdateParentRequest
```

Validation rules should be reusable and maintainable.

---

# 76. Service Standards

Services should handle meaningful business processes.

Examples:

```text
LeadConversionService
SchoolOnboardingService
StudentEnrollmentService
FeePaymentService
ResultPublishingService
NotificationService
```

Avoid creating services merely to move trivial CRUD code out of controllers.

---

# 77. Policy Standards

Use policies for resource authorization.

Examples:

```text
LeadPolicy
SchoolPolicy
StudentPolicy
ParentPolicy
AttendancePolicy
FeePolicy
ResultPolicy
```

Policies should consider both permission and ownership/scope where necessary.

---

# 78. Route Standards

Routes should use meaningful names.

Examples:

```text
leads.index
leads.create
leads.store
leads.show
leads.edit
leads.update
leads.destroy
```

Portal routes should remain clearly separated by functional area.

---

# 79. UI Principles

The ERP UI should be:

* Professional
* Clean
* Responsive
* Consistent
* Accessible
* Fast
* Dashboard-oriented

Common components should be reusable:

```text
Tables
Forms
Modals
Alerts
Cards
Filters
Pagination
Breadcrumbs
Status Badges
Confirmation Dialogs
```

---

# 80. Status Standards

Status values should be consistent throughout the application.

Do not use:

```text
Active
active
ACTIVE
Currently Active
```

for the same concept.

Use standardized values.

---

# 81. Error Handling

The system should handle:

```text
Validation Errors
Authorization Errors
Not Found
Database Errors
File Errors
Business Rule Violations
External Service Errors
```

Users should receive understandable messages.

Developers should receive sufficient logs for debugging.

---

# 82. Logging

Application logs should be used for:

* Exceptions
* Failed jobs
* Integration failures
* Important system events

Do not log passwords, authentication secrets, or unnecessary sensitive information.

---

# 83. Database Backup Strategy

Production should have:

* Scheduled database backups
* Backup retention
* Recovery testing
* Secure backup storage

A backup is not considered reliable until restoration has been tested.

---

# 84. Production Principles

Before production:

```text
Environment Configuration
        ↓
Database Migration
        ↓
Seed Required Data
        ↓
Storage Configuration
        ↓
Queue Configuration
        ↓
Cache Configuration
        ↓
Mail Configuration
        ↓
Security Review
        ↓
Testing
        ↓
Backup
        ↓
Deployment
```

Never use development credentials in production.

---

# 85. Development Environment

Expected environment:

```text
Windows / Linux
PHP 8.3+
Laravel
MySQL 8+
Composer
Node.js
NPM
Git
Apache / Nginx
```

Local development may use:

```text
WAMP
XAMPP
Laragon
Laravel Herd
```

depending on developer environment.

---

# 86. Git Strategy

Branches:

```text
main
develop
```

Feature branches:

```text
feature/authentication
feature/rbac
feature/sales
feature/leads
feature/schools
feature/students
feature/parents
feature/coordinators
feature/academic
feature/attendance
feature/fees
feature/reports
```

Bug fixes:

```text
fix/lead-validation
fix/student-access
fix/fee-calculation
```

---

# 87. Commit Standards

Use meaningful commits.

Good:

```text
Add lead management module
Add parent student relationship
Implement student enrollment
Add sales follow-up workflow
Implement attendance permissions
```

Avoid:

```text
update
changes
test
final
new
done
```

---

# 88. Pull Request Standards

Before merging:

* Code review
* Tests pass
* Authorization verified
* Validation verified
* Database migration reviewed
* Security reviewed
* Documentation updated

---

# 89. Module Completion Checklist

A module is not complete until it has:

```text
[ ] Business requirement
[ ] Database design
[ ] Migration
[ ] Model
[ ] Relationships
[ ] Factory if required
[ ] Seeder if required
[ ] Form Requests
[ ] Service if required
[ ] Controller
[ ] Policy
[ ] Permissions
[ ] Routes
[ ] Views
[ ] Validation
[ ] Error handling
[ ] Audit logging where required
[ ] Tests
[ ] Reports where required
[ ] Documentation
```

---

# 90. Current Development Priority

The recommended initial implementation sequence is:

```text
PHASE 1
Authentication
        ↓
Users
        ↓
Roles
        ↓
Permissions
        ↓
Admin Dashboard

PHASE 2
Sales Team
        ↓
Leads
        ↓
Lead Assignment
        ↓
Follow-ups
        ↓
Activities
        ↓
Proposals
        ↓
School Conversion

PHASE 3
Schools
        ↓
Programs
        ↓
Coordinators
        ↓
School Onboarding

PHASE 4
Students
        ↓
Parents
        ↓
Parent-Student
        ↓
Enrollment
        ↓
Student Portal
        ↓
Parent Portal

PHASE 5
Academic Structure
        ↓
Classes
        ↓
Sections
        ↓
Batches
        ↓
Attendance

PHASE 6
Assignments
        ↓
Examinations
        ↓
Results
        ↓
Reports

PHASE 7
Fees
        ↓
Payments
        ↓
Receipts
        ↓
Financial Reports
```

---

# 91. Definition of Done

A feature is considered complete only when:

1. Business requirements are understood.
2. Database design is finalized.
3. Relationships are correct.
4. Validation is implemented.
5. Authorization is implemented.
6. Data scope is enforced.
7. UI is implemented.
8. Error handling exists.
9. Audit requirements are satisfied.
10. Tests pass.
11. Reports are updated if necessary.
12. Documentation is updated.

---

# 92. Non-Negotiable Rules

## Rule 1 — Never bypass authorization

Every protected resource must verify access.

## Rule 2 — Never trust IDs from the browser

Always verify ownership/scope.

## Rule 3 — Do not delete important business history

Use appropriate status, archive, reversal, or soft-delete workflows.

## Rule 4 — Do not duplicate business logic

Shared logic belongs in services or appropriate domain layers.

## Rule 5 — Do not build database tables without relationships

Every entity must have a defined business purpose and relationship model.

## Rule 6 — Do not implement features only as CRUD

Understand the workflow first.

## Rule 7 — Maintain historical academic data

Changing an academic year or class must not destroy previous records.

## Rule 8 — Financial records require controlled modification

Payments and receipts must maintain auditability.

## Rule 9 — Published results require controlled correction

Never silently overwrite published academic results.

## Rule 10 — Every major business action should be traceable

Use activity/audit logs where appropriate.

---

# 93. Long-Term Vision

FoxBrain ERP should eventually provide a unified platform:

```text
                         FOXBRAIN ERP
                              │
       ┌──────────────────────┼──────────────────────┐
       │                      │                      │
       ▼                      ▼                      ▼
 SALES MANAGEMENT       SCHOOL MANAGEMENT       ADMINISTRATION
       │                      │                      │
       │                      │                      │
       ▼                      ▼                      ▼
    Leads                 Schools                 Users
    Deals                 Programs                Roles
    Follow-ups            Coordinators             Permissions
    Proposals             Students                 Settings
    Activities            Parents                  Audit
                          Academic
                          Attendance
                          Results
                          Fees
                              │
                              ▼
                    ┌──────────────────┐
                    │  PORTAL LAYER    │
                    ├──────────────────┤
                    │ Sales            │
                    │ Coordinator      │
                    │ Student          │
                    │ Parent           │
                    └──────────────────┘
                              │
                              ▼
                    API / Mobile Future
```

---

# 94. Final System Goal

The ultimate objective of FoxBrain ERP is to provide FoxBrain Pvt. Ltd. with one centralized system where:

```text
Sales Team
    ↓
manages business opportunities

Admin
    ↓
manages the complete system

Coordinators
    ↓
manage schools and students

Students
    ↓
manage their academic activities

Parents
    ↓
monitor their children

Management
    ↓
gets operational and business reports
```

The system should be:

* Scalable
* Secure
* Maintainable
* Modular
* Auditable
* API-ready
* Mobile-ready
* Business-process driven

---

# 95. Source of Truth

For development decisions:

```text
Business Requirement
        ↓
BRAIN.md
        ↓
Database Design
        ↓
Implementation
```

`README.md` explains **what the project is**.

`BRAIN.md` defines **how the project must work**.

When implementing a new module, update `BRAIN.md` whenever the business architecture, workflow, relationship, permission model, or major rule changes.

---

# End of BRAIN.md

**FoxBrain Pvt. Ltd.**

**FoxBrain ERP — Sales Management & School Education ERP**
