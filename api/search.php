<?php

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $search = trim($_POST['search']);


  $stmt = $pdo->prepare("SELECT * FROM users WHERE firstname LIKE '%$search%' || lastname LIKE '%$search%'");
  $stmt->execute();
  $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  $output = '<table class="table table-striped">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

  ';
  foreach ($users as $user) {
    $output .= '      <tr>
        <td>' . $user['firstname'] . '</td>
        <td>' . $user['lastname'] . '</td>
        <td>' . $user['email'] . '</td>
        <td>' . $user['phone'] . '</td>
        <td>
            <button class="btn btn-sm btn-warning text-white" onclick="get_details(' . $user['user_id'] . ')" data-toggle="modal" data-target="#editModal">Edit</button>
            <button class="btn btn-sm btn-danger" onclick="deleteUser(' . $user['user_id'] . ')">Delete</button>
        </td>
      </tr>';
  }

  $output .= '  </tbody>
    </table>';

  echo $output;
}
