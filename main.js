function displayData(page) {
  let displayData = "true";
  let formData = new FormData();
  formData.append("displayData", displayData);
  formData.append("page", page);
  let ajax = new XMLHttpRequest();
  ajax.addEventListener("readystatechange", function (e) {
    document.querySelector("#displayDataTable").innerHTML = ajax.responseText;
  });

  ajax.open("POST", "api/display.php", true);
  ajax.send(formData);
}

function search(text) {
  if (text.trim() !== "") {
    let formData = new FormData();
    formData.append("search", text);
    let ajax = new XMLHttpRequest();
    ajax.addEventListener("readystatechange", function (e) {
      if (ajax.readyState == 4 && ajax.status == 200) {
        document.querySelector("#displayDataTable").innerHTML =
          ajax.responseText;
      }
    });

    ajax.open("POST", "api/search.php", true);
    ajax.send(formData);
  } else {
    displayData(1);
  }
}

function addUser() {
  let elements = document.querySelectorAll(".add");
  let formData = new FormData();
  elements.forEach((el) => {
    formData.append(el.name, el.value);
  });

  let ajax = new XMLHttpRequest();
  ajax.addEventListener("readystatechange", function (e) {
    if (ajax.readyState == 4 && ajax.status == 200) {
      elements.forEach((el) => {
        el.value = "";
      });
      displayData(1);
    }
  });

  ajax.open("POST", "api/insert.php", true);
  ajax.send(formData);
}

function get_details(user_id) {
  let formData = new FormData();
  formData.append("user_id", user_id);
  let ajax = new XMLHttpRequest();
  ajax.addEventListener("readystatechange", function (e) {
    if (ajax.readyState == 4 && ajax.status == 200) {
      res = JSON.parse(ajax.responseText);

      document.querySelector("#user_id").value = res.user_id;
      document.querySelector("#firstname").value = res.firstname;
      document.querySelector("#lastname").value = res.lastname;
      document.querySelector("#email").value = res.email;
      document.querySelector("#phone").value = res.phone;
    }
  });

  ajax.open("POST", "api/get_details.php", true);
  ajax.send(formData);
}

function update() {
  let elements = document.querySelectorAll(".edit");
  let formData = new FormData();
  elements.forEach((el) => {
    formData.append(el.name, el.value);
  });

  let ajax = new XMLHttpRequest();
  ajax.addEventListener("readystatechange", function (e) {
    if (ajax.readyState == 4 && ajax.status == 200) {
      displayData(1);
    }
  });

  ajax.open("POST", "api/update.php", true);
  ajax.send(formData);
}

function deleteUser(user_id) {
  let formData = new FormData();
  formData.append("user_id", user_id);

  let ajax = new XMLHttpRequest();
  ajax.addEventListener("readystatechange", function (e) {
    if (ajax.readyState == 4 && ajax.status == 200) {
      displayData(1);
    }
  });

  ajax.open("POST", "api/delete.php", true);
  ajax.send(formData);
}

displayData(1);
