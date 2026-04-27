#!/bin/bash

# ============================================
# 🚀 API TEST RUNNER - Appointment Booking System
# ============================================

echo "----------------------------------------"
echo "🔧 Starting API tests (Appointment System)"
echo "----------------------------------------"

# 📁 Paths
COLLECTION="postman/collection.json"
ENVIRONMENT="postman/environment.json"
REPORT_DIR="reports"
REPORT_FILE="$REPORT_DIR/report.html"

# 📦 Check if Newman is installed
if ! command -v newman &> /dev/null
then
    echo "❌ Newman is not installed."
    echo "👉 Install it with: npm install -g newman"
    exit 1
fi

# 📁 Create report directory if not exists
mkdir -p $REPORT_DIR

# ▶️ Run tests
echo "▶️ Running tests..."

newman run $COLLECTION \
    -e $ENVIRONMENT \
    -r cli,html \
    --reporter-html-export $REPORT_FILE

# 📊 Capture result
RESULT=$?

echo "----------------------------------------"

if [ $RESULT -eq 0 ]; then
    echo "✅ Tests PASSED successfully"
    echo "📄 Report generated at: $REPORT_FILE"
else
    echo "❌ Tests FAILED"
    echo "📄 Check report: $REPORT_FILE"
    exit 1
fi

echo "----------------------------------------"
echo "🏁 Test execution finished"
echo "----------------------------------------"