<?php
header("Content-type: text/css");
?>
<style>
body {
  background: linear-gradient(to right, #eef2f3, #8e9eab);
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  padding: 40px;
}

.container {
  max-width: 800px;
  background: #fff;
  padding: 40px;
  margin: auto;
  border-radius: 15px;
  box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  font-size: 28px;
  margin-bottom: 30px;
  color: #2c3e50;
}

h2 {
  font-size: 20px;
  margin-bottom: 15px;
  color: #27ae60;
}

.info-table {
  width: 100%;
  border-collapse: collapse;
  margin-bottom: 25px;
}

.info-table td {
  border: 1px solid #ddd;
  padding: 10px 15px;
}

.info-table tr:nth-child(even) {
  background-color: #f9f9f9;
}

input[type="text"],
textarea,
select {
  width: 100%;
  padding: 10px 12px;
  margin-top: 5px;
  margin-bottom: 20px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 14px;
}

.checkbox-group label,
.radio-group label {
  margin-right: 15px;
}

button {
  background-color: #2980b9;
  color: white;
  padding: 12px 25px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-size: 16px;
  transition: 0.3s;
}

button:hover {
  background-color: #3498db;
}

.alert {
  padding: 15px;
  border-radius: 8px;
  margin-bottom: 20px;
}

.alert-error {
  background-color: #f8d7da;
  color: #721c24;
  border: 1px solid #f5c6cb;
}

.result-box {
  background-color: #ecfdf5;
  padding: 20px;
  border: 1px solid #d1fae5;
  border-radius: 10px;
  margin-bottom: 20px;
}

.result-highlight {
  color: green;
  font-weight: bold;
  margin-top: 10px;
}

.button-link {
  display: inline-block;
  margin-top: 20px;
  text-decoration: none;
  font-weight: bold;
  color: #2980b9;
}

.button-link:hover {
  text-decoration: underline;
}

</style>
