const express = require("express");
const bodyParser = require("body-parser");
const app = express();
const PORT = process.env.PORT || 3000;

// Middleware for parsing JSON data
app.use(bodyParser.json());

// In-memory database (replace with an actual database in production)
const servicesDB = [];

// Endpoint for saving data
app.post("/save", (req, res) => {
    const { service, schedule, amount } = req.body;

    // Store data in the "servicesDB" (replace with database storage)
    servicesDB.push({ service, schedule, amount });

    res.json({ message: "Data saved successfully" });
});

app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
