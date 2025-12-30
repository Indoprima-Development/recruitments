# Indoprima Recruitment Portal

This is a comprehensive Recruitment Management System built with Laravel. It facilitates the entire recruitment lifecycle, from job requisition (PTK) and vacancy publication to candidate application, resume management, and online assessments.

## 🚀 Key Features

### 1. Public Portal

-   **Landing Page**: General information and entry point.
-   **Job Vacancies**: Browse available job openings (`/vacancies`).
-   **Job Details**: View specific requirements and job descriptions.

### 2. Candidate Portal (User)

Candidates can register, manage their professional profile (CV), and participate in recruitment processes.

-   **Authentication**: Registration, Login, Forget Password, Email Verification.
-   **Dashboard**: Overview of applied jobs and active assessments.
-   **Resume Builder**: Comprehensive form wizards to input:
    -   Personal Data (Data Diri)
    -   Formal & Non-Formal Education
    -   Family Data (Data Keluarga)
    -   Work Experience (Pengalaman Kerja)
    -   Skills (Kemampuan)
    -   Organizational Experience & Sports
    -   Health Records
    -   File Uploads (CV, Photo)
-   **Online Assessment**:
    -   Take exams tied to specific recruitment projects.
    -   Real-time timer and submission.
    -   View rank/results (if enabled).

### 3. Administrator Portal

A powerful backend for HR and administrators to manage the system.

-   **Analytics Dashboard**: Overview of recruitment metrics.
-   **Master Data Management**:
    -   Divisions, Departments, Sections, Job Titles.
    -   Education levels, Majors, Locations.
-   **Job Requisition (PTK) Management**:
    -   Create and manage Employement Requisitions (PTK Forms).
    -   Approval workflows.
-   **Recruitment Projects**:
    -   Manage recruitment batches/projects.
    -   Link exams to projects.
-   **Exam Management**:
    -   Create Exams and Questions (QnA).
    -   Upload images for questions.
-   **Applicant Tracking**:
    -   View applicant lists.
    -   process applications (Change Status).
    -   `Ptkformtransactions` handles the lifecycle of an application.

---

## 🛣️ Route & Functionality Breakdown

Based on `routes/web.php`, here is the detailed breakdown of the application's functionalities:

### Public & Authentication

| Method     | Route                    | Description                        |
| :--------- | :----------------------- | :--------------------------------- |
| `GET`      | `/`                      | Landing page.                      |
| `GET`      | `/vacancies`             | List of all open vacancies.        |
| `GET`      | `/vacancies/{id}`        | Detail view of a specific vacancy. |
| `GET/POST` | `/auth/register`         | Candidate registration.            |
| `GET/POST` | `/auth/login`            | Candidate login.                   |
| `GET/POST` | `/auth/login-admin-root` | Administrator login.               |
| `POST`     | `/auth/forget-password`  | Password recovery initiation.      |
| `POST`     | `/auth/change-password`  | Update current user's password.    |

### Candidate / User Features (Middleware: `auth`)

These routes allow candidates to build their profile and take tests.

**Dashboard & Tests**

-   `/home`, `/dashboard`: User main dashboard.
-   `/examination/{project_id}`: Interface to take an exam.
-   `/submit-test/{exam_id}`: Submit exam answers.
-   `/exam-histories`: View past exam results.

**Profile Management (Resume)**
The system uses multiple controllers to manage different sections of a CV:

-   **Core Profile**: `DatadirisController` (Personal info, Photo, CV upload).
-   **Education**: `DatapendidikanformalsController`, `DatapendidikannonformalsController`.
-   **Experience**: `DatapengalamankerjasController`, `DataorganisasisController`.
-   **Others**: `DatakeluargasController`, `DatakemampuansController`, `DatakesehatansController`.

**Forms Routes**:

-   `/forms`: Main entry point for the multi-step profile form.

### Administrator Features (Middleware: `auth`, `isadmin`)

Restricted area for management.

**Analytics**

-   `/analytics`: Statistical overview of the recruitment data.

**Organization Structure (Master Data)**

-   `/divisions`, `/departments`, `/sections`: Manage company hierarchy.
-   `/jobtitles`: Manage available job positions.
-   `/locations`: Manage office/branch locations.

**Recruitment & Processing**

-   `/ptkforms`: Manage Job Requisition Forms (Permintaan Tenaga Kerja).
-   `/ptkformtransactions`: Manage candidate applications (The core transaction table tracking who applied to what).
    -   `dataByStatus`: Filter applicants by their recruitment stage.
    -   `changeStatus`: Move applicants to the next stage (e.g., Admin -> Psikotest -> Interview).

**Assessments (CBT)**

-   `/projects`: Manage recruitment projects (e.g., "Batch 1 2024").
-   `/exams`: Create and configure exam papers.
-   `/qnas`: Manage questions and answers for exams.

## 🛠️ Tech Stack

-   **Framework**: Laravel
-   **Frontend**: Blade Templates, Bootstrap 5, jQuery.
-   **Database**: SQL Server.

## 📦 Installation

1. **Clone the repository**

    ```bash
    git clone https://github.com/Indoprima-Development/recruitments.git
    cd recruitments
    ```

2. **Install Dependencies**

    ```bash
    composer install
    npm install && npm run dev
    ```

3. **Environment Setup**
   Copy the `.env.example` file to `.env` and configure your database credentials.

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Database Migration**

    ```bash
    php artisan migrate --seed
    ```

5. **Run the Application**
    ```bash
    php artisan serve
    ```
