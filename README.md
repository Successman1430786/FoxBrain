# FoxBrain ERP

## Sales Management & School Education ERP

A comprehensive **Sales Management and School Education ERP** developed for **FoxBrain Pvt. Ltd.** using PHP Laravel and MySQL.

FoxBrain ERP is designed to manage the company's sales operations and educational activities through a centralized platform.

The system combines a Sales Management System with a complete School ERP, allowing FoxBrain to manage its sales team, schools, coordinators, students, parents, and academic operations from a single application.

---

# 1. Project Overview

FoxBrain ERP is a centralized business management platform designed to support the complete operational workflow of FoxBrain Pvt. Ltd.

The system consists of two major components:

### A. Sales Management System

Manages the company's sales operations, including:

* Sales team management
* Lead management
* School and client management
* Sales follow-ups
* Sales activities
* Proposals and quotations
* School onboarding
* Student enrollment
* Sales performance reports

### B. School Education ERP

Manages educational operations, including:

* Admin dashboard
* Coordinator management
* Student management
* Parent management
* Academic management
* Attendance
* Assignments
* Examinations
* Results
* Fees
* Communication
* Reports

Both systems share centralized data and role-based access.

---

# 2. Project Objectives

The primary objectives of FoxBrain ERP are:

* Manage the complete sales lifecycle.
* Manage sales employees and their activities.
* Maintain school and client information.
* Track leads, follow-ups, and sales opportunities.
* Convert sales opportunities into active school clients.
* Manage school onboarding and program allocation.
* Register and manage students.
* Manage parents and guardians.
* Manage coordinators and academic operations.
* Provide separate portals for Admin, Sales, Coordinators, Students, and Parents.
* Manage academic years, classes, sections, and batches.
* Track attendance and student progress.
* Manage fees, payments, and receipts.
* Generate sales, academic, and financial reports.
* Maintain secure access through role-based permissions.
* Support future API and mobile application development.

---

# 3. System Workflow

The ERP connects the company's sales operations with its educational operations.

```text
FOX BRAIN ERP
      |
      ├── SALES MANAGEMENT
      |       |
      |       ├── Sales Team
      |       ├── Leads
      |       ├── School Prospects
      |       ├── Follow-ups
      |       ├── Proposals
      |       ├── Sales Deals
      |       └── School Onboarding
      |
      └── SCHOOL ERP
              |
              ├── Admin
              ├── Coordinators
              ├── Students
              ├── Parents
              ├── Academic Management
              ├── Attendance
              ├── Examinations
              ├── Fees
              └── Reports
```

## Business Workflow

```text
Lead Generation
      ↓
Sales Follow-up
      ↓
School / Client Confirmation
      ↓
School Onboarding
      ↓
Program / Course Setup
      ↓
Student Enrollment
      ↓
Coordinator Assignment
      ↓
Class / Batch Assignment
      ↓
Academic Operations
      ↓
Attendance / Assignments
      ↓
Examinations / Results
      ↓
Parent Portal
      ↓
Reports
```

---

# 4. User Roles & Portals

The system will provide separate dashboards and access permissions for different users.

| Role            | Main Responsibilities                           |
| --------------- | ----------------------------------------------- |
| Super Admin     | Complete system administration                  |
| Admin           | Manage school ERP operations                    |
| Sales Manager   | Manage sales team and sales operations          |
| Sales Executive | Manage assigned leads and follow-ups            |
| Coordinator     | Manage assigned schools and academic operations |
| Student         | Access personal academic information            |
| Parent          | Access information about their children         |

Additional roles such as teachers, accountants, and management users can be introduced in future phases.

---

# 5. Admin Portal

The Admin Portal manages the complete ERP system.

## Features

* Admin dashboard
* User management
* Role management
* Permission management
* Sales team management
* Coordinator management
* School management
* Student management
* Parent management
* Academic year management
* Class management
* Section management
* Program management
* Attendance management
* Examination management
* Fee management
* Reports
* System settings
* Activity logs

Admin access will be controlled through permissions.

---

# 6. Sales Management System

The Sales Management System manages FoxBrain's sales operations.

## 6.1 Sales Team Management

* Sales employee profiles
* Employee information
* Sales team assignment
* Sales manager assignment
* Employee status
* Assigned leads
* Sales activity tracking
* Follow-up monitoring
* Sales reports

## 6.2 Lead Management

Manage potential schools and educational clients.

Lead information:

* Lead ID
* School / organization name
* Contact person
* Phone number
* Email
* Address
* City
* State
* Lead source
* School type
* Estimated student strength
* Required program
* Assigned sales executive
* Lead status
* Lead priority
* Remarks

## 6.3 Lead Sources

Examples:

* Website
* Phone Call
* WhatsApp
* Email
* School Visit
* Reference
* Social Media
* Exhibition
* Advertisement
* Other

## 6.4 Lead Status

```text
New
  ↓
Contacted
  ↓
Qualified
  ↓
Requirement Collected
  ↓
Proposal Sent
  ↓
Negotiation
  ↓
Won / Lost
```

Additional statuses:

* On Hold
* Not Interested
* Future Opportunity

## 6.5 Sales Follow-up Management

Sales employees can manage follow-ups for their assigned leads.

Features:

* Follow-up scheduling
* Call records
* School visit records
* Meeting records
* Discussion notes
* Next follow-up date
* Follow-up reminders
* Follow-up status
* Sales activity history

## 6.6 Proposal & Quotation Management

* Create proposals
* Create quotations
* Select educational programs
* Add pricing
* Add discounts
* Define proposal validity
* Track proposal status
* Maintain proposal history

## 6.7 School Client Management

Once a sales opportunity is confirmed, the lead can be converted into an active school client.

Features:

* School profile
* School contacts
* Address
* School representatives
* Programs
* Agreement details
* Onboarding status
* Assigned coordinator
* Student capacity
* Client documents

## 6.8 Sales Dashboard

The Sales Dashboard may display:

* Total leads
* New leads
* Assigned leads
* Today's follow-ups
* Upcoming follow-ups
* Qualified leads
* Proposals sent
* Won deals
* Lost deals
* Active school clients

---

# 7. School Management

The School Management module maintains all schools associated with FoxBrain.

Features:

* School registration
* School profile
* School contacts
* School address
* School representatives
* Academic year
* Programs offered
* Assigned coordinators
* Classes and sections
* Student enrollment
* School status
* School documents

A school can have multiple programs, classes, sections, coordinators, and students.

---

# 8. Coordinator Management

Coordinators manage assigned schools and educational operations.

Features:

* Coordinator profiles
* Employee information
* Assigned schools
* Assigned programs
* Assigned classes
* Student management
* Attendance monitoring
* Academic activities
* Student progress
* Communication
* Reports

Coordinators should only access schools and students assigned to them unless additional permissions are granted.

---

# 9. Student Management

The Student Management module manages student information and enrollment.

## Student Features

* Student registration
* Student profile
* Admission number
* Student ID
* School assignment
* Academic year assignment
* Class assignment
* Section assignment
* Batch assignment
* Program assignment
* Parent relationship
* Student documents
* Enrollment status
* Student account

## Student Enrollment Workflow

```text
School Onboarded
      ↓
Program Assigned
      ↓
Student Registration
      ↓
Parent Information
      ↓
Class / Section / Batch
      ↓
Student Account
      ↓
Enrollment Confirmed
```

---

# 10. Parent Management

The Parent Management module manages parents and guardians.

## Features

* Parent registration
* Parent profile
* Contact information
* Parent login
* Multiple children support
* Child selection
* Academic information
* Attendance information
* Fee information
* Examination results
* Notices
* Notifications

One parent can be connected to multiple students.

```text
Parent
  |
  ├── Student 1
  ├── Student 2
  └── Student 3
```

Parents can only access information for their linked children.

---

# 11. Student Portal

The Student Portal provides students with access to their academic information.

## Features

* Student dashboard
* Personal profile
* School information
* Class and section
* Program information
* Attendance
* Assignments
* Homework
* Examination schedule
* Results
* Report cards
* Fee information
* Notices
* Notifications

Students can only access their own records.

---

# 12. Parent Portal

The Parent Portal provides parents with information about their children.

## Features

* Parent dashboard
* Child selection
* Student profile
* School information
* Class and section
* Attendance
* Assignments
* Examination schedule
* Results
* Report cards
* Fee details
* Payment history
* Receipts
* Notices
* Notifications

When a parent has multiple children, the parent can select a child to view that child's information.

---

# 13. Academic Management

The Academic Management module manages the educational structure.

## Features

* Academic years
* Classes
* Sections
* Batches
* Programs
* Subjects
* Class subjects
* Timetable
* Academic activities

## Academic Structure

```text
School
  |
  └── Academic Year
         |
         ├── Classes
         |     |
         |     └── Sections
         |            |
         |            └── Students
         |
         └── Programs
                |
                └── Batches
                       |
                       └── Students
```

---

# 14. Attendance Management

Features:

* Daily attendance
* Class-wise attendance
* Section-wise attendance
* Batch-wise attendance
* Student attendance history
* Attendance correction
* Attendance reports
* Monthly attendance
* Attendance percentage

Attendance statuses:

* Present
* Absent
* Late
* Leave
* Holiday

---

# 15. Assignment & Activity Management

Features:

* Assignment creation
* Homework
* Robotics projects
* Coding activities
* STEM activities
* Practical activities
* Submission tracking
* Evaluation
* Teacher remarks
* Student progress

---

# 16. Examination & Result Management

Features:

* Examination creation
* Examination schedule
* Assessment management
* Marks entry
* Grades
* Results
* Report cards
* Student performance
* Academic reports

---

# 17. Finance & Fee Management

The Finance module manages student and school-related financial records.

Features:

* Fee types
* Fee structures
* School program fees
* Student fees
* Payments
* Receipts
* Discounts
* Scholarships
* Outstanding fees
* Payment history
* Financial reports

The system should support both school-level agreements and student-level fee records where applicable.

---

# 18. Communication Management

Features:

* Notices
* Announcements
* Notifications
* Internal messages
* Email notifications
* School communication
* Parent communication
* Student communication
* Sales communication

Future integrations:

* WhatsApp
* SMS
* Push notifications
* Mobile applications

---

# 19. Reports & Analytics

## Sales Reports

* Lead reports
* Sales employee reports
* Follow-up reports
* Lead source reports
* Proposal reports
* Won/Lost deal reports
* School onboarding reports

## School Reports

* School-wise students
* School-wise programs
* School enrollment
* Active schools
* Student status

## Academic Reports

* Attendance reports
* Assignment reports
* Examination reports
* Results
* Student progress

## Finance Reports

* Fee collection
* Outstanding fees
* Payment history
* School-wise financial reports
* Student-wise fee reports

---

# 20. Role-Based Access Control

The system uses Role-Based Access Control (RBAC).

Roles and permissions are maintained independently.

Example permissions:

```text
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

reports.view
```

Access will also be restricted according to assigned schools, leads, students, and parent-child relationships.

---

# 21. Technology Stack

| Technology   | Purpose                        |
| ------------ | ------------------------------ |
| PHP 8.3+     | Backend language               |
| Laravel      | Backend framework              |
| MySQL 8+     | Database                       |
| Eloquent ORM | Database relationships         |
| Blade        | Template engine                |
| Bootstrap 5  | User interface                 |
| JavaScript   | Frontend interactions          |
| Vite         | Asset bundling                 |
| Composer     | PHP dependency management      |
| NPM          | Frontend dependency management |
| Git          | Version control                |

---

# 22. Requirements

Before installation, ensure the system has:

* PHP 8.3+
* Composer
* MySQL 8+
* Node.js
* NPM
* Git
* Apache or Nginx
* Required PHP extensions

Check PHP:

```bash
php -v
```

Check Composer:

```bash
composer -V
```

Check Node.js:

```bash
node -v
```

Check NPM:

```bash
npm -v
```

---

# 23. Installation

## Clone Repository

```bash
git clone <repository-url>
cd foxbrain-erp
```

## Install PHP Dependencies

```bash
composer install
```

## Create Environment File

Windows:

```bash
copy .env.example .env
```

Linux/macOS:

```bash
cp .env.example .env
```

## Generate Application Key

```bash
php artisan key:generate
```

---

# 24. Database Configuration

Create a MySQL database:

```sql
CREATE DATABASE foxbrain_erp;
```

Configure the `.env` file:

```env
APP_NAME="FoxBrain ERP"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=foxbrain_erp
DB_USERNAME=root
DB_PASSWORD=
```

Use the correct credentials for your environment.

---

# 25. Run Migrations

```bash
php artisan migrate
```

For a fresh development database:

```bash
php artisan migrate:fresh --seed
```

**Warning:** Never run `migrate:fresh` on a production database.

---

# 26. Frontend Setup

Install dependencies:

```bash
npm install
```

Run the development server:

```bash
npm run dev
```

Build production assets:

```bash
npm run build
```

---

# 27. Start Development Server

```bash
php artisan serve
```

Application:

```text
http://127.0.0.1:8000
```

---

# 28. Project Structure

```text
foxbrain-erp/
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   ├── Sales/
│   │   │   ├── Coordinator/
│   │   │   ├── Student/
│   │   │   └── Parent/
│   │   │
│   │   ├── Middleware/
│   │   └── Requests/
│   │
│   ├── Models/
│   ├── Services/
│   └── Policies/
│
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── resources/
│   └── views/
│       ├── admin/
│       ├── sales/
│       ├── coordinator/
│       ├── student/
│       └── parent/
│
├── routes/
│   ├── web.php
│   └── api.php
│
├── public/
├── storage/
├── tests/
│
├── .env
├── .env.example
├── BRAIN.md
├── README.md
├── composer.json
└── package.json
```

---

# 29. Core Database

The initial database is expected to include:

```text
users
roles
permissions
role_permissions

sales_employees
leads
lead_sources
lead_activities
lead_followups
proposals

schools
school_contacts
school_documents
school_programs

coordinators
students
parents
parent_student

academic_years
classes
sections
batches

programs
subjects
class_subjects

attendance
assignments
examinations
results

fee_types
fee_structures
student_fees
payments
receipts

notices
notifications
activity_logs
settings
```

The final schema will be determined during database design.

---

# 30. Security

The application will follow Laravel security practices:

* Password hashing
* Authentication middleware
* Authorization policies
* Role-based permissions
* CSRF protection
* Form validation
* Eloquent ORM
* SQL parameter binding
* Mass assignment protection
* Session security
* File validation
* Audit logging
* Record-level access restrictions

Users must only access records permitted by their role and organizational scope.

Examples:

* Sales Executives can access assigned leads.
* Coordinators can access assigned schools and students.
* Students can access their own records.
* Parents can access records of their linked children.
* Admins can access records permitted by their assigned permissions.

---

# 31. Development Workflow

Every major module should follow:

```text
Business Requirement
        ↓
Business Workflow
        ↓
Database / ER Design
        ↓
Migration
        ↓
Model
        ↓
Relationships
        ↓
Seeder
        ↓
Form Request
        ↓
Business Logic / Service
        ↓
Controller
        ↓
Routes
        ↓
Views
        ↓
Authorization
        ↓
Testing
        ↓
Documentation
```

---

# 32. Development Roadmap

## Phase 1 — Foundation

* Project architecture
* Authentication
* Users
* Roles
* Permissions
* Admin dashboard
* System settings
* Activity logs

## Phase 2 — Sales Management

* Sales team
* Sales employee profiles
* Leads
* Lead sources
* Follow-ups
* Sales activities
* Proposals
* Sales dashboard
* Sales reports

## Phase 3 — School Management

* School profiles
* School contacts
* School documents
* School programs
* School onboarding
* Coordinator assignment

## Phase 4 — Student & Parent Management

* Coordinators
* Students
* Parents
* Parent-child relationships
* Student enrollment
* Student accounts
* Parent accounts

## Phase 5 — Academic Structure

* Academic years
* Classes
* Sections
* Batches
* Programs
* Subjects
* Class subjects

## Phase 6 — Academic Operations

* Attendance
* Assignments
* Homework
* Activities
* Projects
* Student progress

## Phase 7 — Examinations

* Examinations
* Marks
* Grades
* Results
* Report cards

## Phase 8 — Finance

* Fee types
* Fee structures
* Student fees
* Payments
* Receipts
* Discounts
* Outstanding fees

## Phase 9 — Communication

* Notices
* Notifications
* Messages
* Email notifications
* Parent communication

## Phase 10 — Reports

* Sales reports
* School reports
* Student reports
* Attendance reports
* Examination reports
* Fee reports
* Administrative reports

## Phase 11 — Advanced ERP

* Library management
* Transport management
* Inventory
* Staff management
* Payroll
* REST API
* Parent mobile application
* Student mobile application
* Advanced analytics

---

# 33. Testing

Run all tests:

```bash
php artisan test
```

Testing should cover:

* Authentication
* Role-based authorization
* Sales management
* Lead management
* School management
* Student management
* Parent-child relationships
* Coordinator access
* Academic management
* Attendance
* Fees
* Reports
* Validation
* Security
* Record-level access

---

# 34. Git Workflow

Recommended branches:

```text
main
develop

feature/authentication
feature/rbac
feature/sales-management
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

Create a feature branch:

```bash
git checkout -b feature/sales-management
```

Commit changes:

```bash
git add .
git commit -m "Add sales management foundation"
```

Push:

```bash
git push origin feature/sales-management
```

---

# 35. Project Documentation

## BRAIN.md

`BRAIN.md` is the internal master specification.

It contains:

* Business requirements
* System architecture
* Database design
* Business workflows
* Module definitions
* Relationships
* Business rules
* Security standards
* RBAC
* Development standards
* API planning
* Development roadmap

Developers should review `BRAIN.md` before implementing major features.

## README.md

`README.md` provides:

* Project overview
* Business purpose
* Technology stack
* Installation instructions
* Development setup
* Project structure
* Commands
* Modules
* Roadmap
* Development workflow

---

# 36. Important Development Rules

Every feature must answer:

1. What business problem does it solve?
2. Who will use the feature?
3. What workflow does it support?
4. What database entities are involved?
5. What relationships are required?
6. What permissions are required?
7. What validation is required?
8. What happens when an operation fails?
9. Does it require an audit record?
10. Does it affect reports?
11. Will it need API support later?
12. Can it support future mobile applications?

Features must be implemented according to business requirements rather than as basic CRUD operations only.

---

# 37. Project Vision

FoxBrain ERP aims to provide a centralized platform for managing the company's sales operations and educational services.

The long-term vision is to connect:

```text
FoxBrain Management
        ↓
Sales Team
        ↓
Schools
        ↓
Coordinators
        ↓
Students
        ↓
Parents
        ↓
Academic Operations
        ↓
Finance
        ↓
Communication
        ↓
Reports & Analytics
```

The objective is to manage the complete business and education lifecycle through one secure, scalable, and maintainable ERP system.

---

# 38. License

This project is currently intended for private and internal development by **FoxBrain Pvt. Ltd.**

A formal license can be added when the distribution model is finalized.

---

# Maintained By

**FoxBrain Pvt. Ltd.**

**Project:** FoxBrain ERP — Sales Management & School Education ERP

**Technology:** PHP · Laravel · MySQL · Bootstrap · JavaScript
