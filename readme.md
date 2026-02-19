# AI Microservice + Laravel Backend

This project implements a microservice-based architecture composed of:

- **FastAPI AI Service** (Python) – Handles AI inference and chatbot logic  
- **Laravel Backend** (PHP) – Acts as API Gateway and communicates with the AI service  
- REST API communication between services  

---

# 🏗 System Architecture

Client → Laravel API → FastAPI AI Service → Response → Laravel → Client

Laravel acts as the main backend, while FastAPI handles AI-related processing.

---

# ==============================
# 🔹 FASTAPI AI SERVICE SETUP
# ==============================

## Requirements

- Python 3.10 or higher
- pip
- Git

---

## 1️⃣ Clone Repository

```bash
git clone <your-repository-url>
cd ai-service
```

---

## 2️⃣ Create Virtual Environment

```bash
python -m venv venv
```

---

## 3️⃣ Activate Virtual Environment

### Windows

```bash
venv\Scripts\activate
```

If PowerShell execution policy error occurs:

```powershell
Set-ExecutionPolicy -Scope Process -ExecutionPolicy Bypass
```

Restart terminal after running the command.

Expected result:

```
(venv)
```

### Mac / Linux

```bash
source venv/bin/activate
```

---

## 4️⃣ Install Dependencies

```bash
pip install -r requirements.txt
```

---

## 5️⃣ Run FastAPI Server

```bash
uvicorn main:app --reload --port 8001
```

Server runs at:

```
http://127.0.0.1:8001
```

---

## 6️⃣ Test FastAPI Directly

Open:

```
http://127.0.0.1:8001/docs
```

Swagger UI should load.

---

# ==================================
# 🔹 LARAVEL BACKEND SETUP
# ==================================

## Requirements

- PHP 8.2+
- Composer
- MySQL (if using database)
- Git

---

## 1️⃣ Clone Repository

```bash
git clone <your-repository-url>
cd laravel-backend
```

---

## 2️⃣ Install Dependencies

```bash
composer install
```

---

## 3️⃣ Create Environment File

### Mac / Linux
```bash
cp .env.example .env
```

### Windows
```bash
copy .env.example .env
```

---

## 4️⃣ Generate Application Key

```bash
php artisan key:generate
```

This step is required.

---

## 5️⃣ Configure Environment Variables

Open `.env` and update:

```
APP_URL=http://127.0.0.1:8000

# Database configuration (if used)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=root
DB_PASSWORD=
```

---

## 6️⃣ Run Database Migrations (If Using Database)

```bash
php artisan migrate
```

---

## 7️⃣ Start Laravel Server

```bash
php artisan serve
```

Server runs at:

```
http://127.0.0.1:8000
```

---

## ⚠ Important (Laravel 12+)

Ensure API routes are registered in:

```
bootstrap/app.php
```

This line must exist:

```php
api: __DIR__.'/../routes/api.php',
```

---

# ==========================
# 🔹 TESTING THE SYSTEM
# ==========================

## Test Health Endpoint

Open in browser:

```
http://127.0.0.1:8000/api/ai-health
```

Expected response:

```json
{
  "from_fastapi": {
    "status": "AI service working"
  }
}
```

---

## Test Chat Endpoint (POST)

URL:

```
http://127.0.0.1:8000/api/chat
```

Method: POST  
Body (JSON):

```json
{
  "message": "Hello AI"
}
```

Use:
- Thunder Client (VS Code)
- Postman

Expected response:

```json
{
  "reply": "You said: Hello AI"
}
```

---

# 📁 Recommended Folder Structure

```
ai-service/
│
├── main.py
├── requirements.txt
├── README.md
├── .env (not committed)
└── venv/ (not committed)

laravel-backend/
│
├── app/
├── routes/
├── bootstrap/
├── composer.json
├── .env.example
└── vendor/ (not committed)
```

---

# 🔐 Important Notes

- `venv/` is not committed to GitHub
- `vendor/` is not committed to GitHub
- `.env` files are not committed for security reasons
- Always run `composer install` and `pip install -r requirements.txt` after cloning

---

# 🧠 Technology Stack

- Laravel 12 (PHP)
- FastAPI (Python)
- Uvicorn
- Thunder Client / Postman
- MySQL (optional)
- Transformers / PyTorch (if AI models are integrated)

---

# 📌 Development Notes

- Laravel runs on port **8000**
- FastAPI runs on port **8001**
- Laravel communicates with FastAPI via HTTP requests
- This follows a microservice architecture pattern

---

# 🚀 Future Extensions

- Integrate trained AI model
- Implement RAG pipeline
- Add authentication
- Deploy using Docker
- Deploy to cloud provider

---