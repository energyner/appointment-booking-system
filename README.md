# Archivo: `README.md`**


# ppointment Booking System API

> RESTful API for managing appointments — built as part of the Energyner Learning Management System (LMS)

---

## Organization
**Energyner**  
Learning Management System (LMS)

---

## Author
**René F. Ruano**

---

## Project Overview

The **Appointment Booking System** is a RESTful API designed to manage appointments in real-world scenarios such as medical centers, consulting services, or transportation systems.

This project demonstrates a complete API lifecycle:

- API design (RESTful)
- Backend implementation (PHP)
- Frontend integration (HTML, CSS, JavaScript)
- API documentation (OpenAPI / Swagger)
- API testing (Postman + Newman)
- Automation and validation (CI/CD ready)

---

## Technologies Used

- **Backend:** PHP (WampServer)
- **Frontend:** HTML, CSS, JavaScript
- **API Standard:** RESTful
- **Documentation:** OpenAPI / Swagger
- **Testing:** Postman, Newman
- **Validation:** JSON Schema
- **Automation:** Node.js (CLI tools)

---

## 📁 Project Structure


appointment-booking-system/
│
├── api/
│   └── v1/
│       ├── appointments.php
│       ├── swagger.yaml
│
├── public/
│   ├── index.html
│   ├── swagger.html
│
├── postman/
│   ├── collection.json
│   ├── environment.json
│
├── tests/
│   ├── schema.json
│
├── scripts/
│   ├── run-tests.sh
│
├── reports/
│
├── package.json
├── README.md

---

## Getting Started

### 1️⃣ Clone the repository

```

git clone [https://github.com/your-repo/appointment-booking-system.git](https://github.com/your-repo/appointment-booking-system.git)
cd appointment-booking-system

---

### 2️⃣ Run locally (WampServer)

Place the project inside:

```

www/

```
Access:

```

[http://localhost/www.energyner.net/19-api/appointments/public/](http://localhost/www.energyner.net/19-api/appointments/public/)

---

## 🔗 API Endpoints

| Method | Endpoint | Description |
|--------|--------|------------|
| GET | `/appointments.php` | Get all appointments |
| POST | `/appointments.php` | Create new appointment |
| PATCH | `/appointments.php?id=1` | Update appointment |
| DELETE | `/appointments.php?id=1` | Delete appointment |

---

##  API Documentation (Swagger)

Access interactive documentation:

/public/swagger.html

This allows:

- Explore endpoints
- Execute requests
- Validate responses

---

## API Testing (Postman)

### Import files:

- `postman/collection.json`
- `postman/environment.json`

### Run tests in Postman or CLI:

```

npm install
npm run test:api

---

## Automated Testing (Newman)

Run tests:

npm run test:report

Generate report:

/reports/report.html

---

## OpenAPI Validation

Validate API definition:


npm run validate:openapi

---

## Full Test Pipeline

npm run test:full


Flow:

OpenAPI Validation → API Testing → Report

---

## Features

✔ RESTful architecture  
✔ CRUD operations  
✔ JSON responses  
✔ Swagger interactive documentation  
✔ Postman automated testing  
✔ JSON Schema validation  
✔ CI/CD ready  

---

## Learning Objectives

This project is part of the **Energyner LMS** and helps students:

- Understand RESTful API design
- Implement backend services
- Document APIs professionally
- Test APIs in real conditions
- Automate validation workflows

---

## Live Demo

```

[https://www.energyner.net/jscript/19-api/appointments/public/](https://www.energyner.net/jscript/19-api/appointments/public/)


---

## License

MIT License

---

##  Final Note

> “An API is not complete when it works, but when it can be understood, tested, and trusted.”