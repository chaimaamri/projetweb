<!DOCTYPE html>
<html>
<head>
    <title>Add Travel Offer</title>
</head>
<body>
    <h2>Add a New Travel Offer</h2>
    <form action="Verification.php" method="POST">
        <label>Title:</label>
        <input type="text" name="title" required><br>

        <label>Destination:</label>
        <input type="text" name="destination" required><br>

        <label>Departure Date:</label>
        <input type="date" name="departure_date" required><br>

        <label>Return Date:</label>
        <input type="date" name="return_date" required><br>

        <label>Price:</label>
        <input type="number" name="price" required><br>

        <label>Disponibility:</label>
        <select name="disponibility">
            <option value="1">Available</option>
            <option value="0">Not Available</option>
        </select><br>

        <label>Category:</label>
        <input type="text" name="category" required><br>

        <input type="submit" value="Add Offer">
    </form>
</body>
</html>
