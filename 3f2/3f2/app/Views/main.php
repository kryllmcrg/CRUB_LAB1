<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
    <style>
        /* Resetting default margin and padding */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            text-align: center;
        }

        h1 {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 20px;
            font-size: 28px;
            text-transform: uppercase;
        }

        form {
            background-color: #3498db;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            padding: 20px;
            margin: 20px auto;
            max-width: 400px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #ecf0f1;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #2980b9;
            border-radius: 5px;
            background-color: #ecf0f1;
            color: #333;
        }

        input[type="text"]:focus,
        select:focus {
            outline: none;
            border-color: #3498db;
        }

        input[type="submit"] {
            background-color: #e74c3c;
            color: #ecf0f1;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #c0392b;
        }

        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #3498db;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            color: #ecf0f1;
        }

        th, td {
            border: 1px solid #2980b9;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #e67e22;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #2980b9;
        }

        a {
            text-decoration: none;
            color: #ecf0f1;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h1>Student Information</h1>
    <form action="<?= base_url("save") ?>" method="post">
        <?php if(isset($d['id'])): ?>
            <input type="hidden" name="id" value="<?= $d['id'] ?>">
        <?php endif; ?>
    
        <label for="StudName">Name</label> 
        <input type="text" id="StudName" name="StudName" required value="<?= isset($d['StudName']) ? $d['StudName'] : '' ?>">

        <label for="StudGender">Gender</label>
        <select id="StudGender" name="StudGender" required>
            <option value="Male" <?= isset($d['StudGender']) && $d['StudGender'] === 'Male' ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= isset($d['StudGender']) && $d['StudGender'] === 'Female' ? 'selected' : '' ?>>Female</option>
        </select>

        <label for="StudCourse">Course</label>
        <input type="text" id="StudCourse" name="StudCourse" required value="<?= isset($d['StudCourse']) ? $d['StudCourse'] : '' ?>">

        <label for="StudSection">Section Id</label>
        <select id="StudSection" name="StudSection" required>
            <option value="F1" <?= isset($d['StudSection']) && $d['StudSection'] === 'F1' ? 'selected' : '' ?>>F1</option>
            <option value="F2" <?= isset($d['StudSection']) && $d['StudSection'] === 'F2' ? 'selected' : '' ?>>F2</option>
            <option value="F3" <?= isset($d['StudSection']) && $d['StudSection'] === 'F3' ? 'selected' : '' ?>>F3</option>
            <option value="F4" <?= isset($d['StudSection']) && $d['StudSection'] === 'F4' ? 'selected' : '' ?>>F4</option>
        </select>

        <label for="StudYear">Year</label>
        <input type="text" id="StudYear" name="StudYear" required value="<?= isset($d['StudYear']) ? $d['StudYear'] : '' ?>">
        
        <input type="submit" value="Save">
    </form>

    <table>
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Student Gender</th>
                <th>Student Course</th>
                <th>Student Section</th>
                <th>Student Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($main as $row): ?>
                <tr>
                    <td><?= $row['StudName'] ?></td>
                    <td><?= $row['StudGender'] ?></td>
                    <td><?= $row['StudCourse'] ?></td>
                    <td><?= $row['StudSection'] ?></td>
                    <td><?= $row['StudYear'] ?></td>
                    <td>
                        <a href="delete/<?= $row['id'] ?>">Delete</a>
                        <a href="update/<?= $row['id'] ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
