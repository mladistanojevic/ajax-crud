<?php

require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['displayData'] == true) {
  $limit = 5;
  $page = '';

  if (isset($_POST['page'])) {
    $page = (int)$_POST['page'];
  } else {
    $page = 1;
  }

  $offset = ($page - 1) * $limit;


  $stmt = $pdo->prepare("SELECT * FROM users LIMIT $limit OFFSET $offset");
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

  $st = $pdo->prepare("SELECT * FROM users");
  $st->execute();
  $total = $st->rowCount();
  $total_pages = ceil($total / $limit);
  if ($total_pages >= 2) {

    $output .= '<nav aria-label="...">
    <ul class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
      $output .= '<li class="page-item"><button class="page-link" onclick="displayData(' . $i . ')">' . $i . '</button></li>';
    }

    $output .= '</ul>
    </nav>';
  }

  echo $output;
}
