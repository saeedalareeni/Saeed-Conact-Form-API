function savee() {
  axios
    .post("https://mail.sfa.com.ps/api/contact/save", {
      contact_type: document.getElementById("contact_type").value,
      status: document.getElementById("status").value,
      name: document.getElementById("name").value,
      mobile: document.getElementById("mobile").value,
      email: document.getElementById("email").value,
    })
    .then(function (response) {
      Swal.fire("Good job!", "Contact saved successfully!", "success");

      document.getElementById("name").value = " ";
      document.getElementById("mobile").value = " ";
      document.getElementById("email").value = " ";
    })
    .catch(function (error) {
      console.log(error.response.data.message);

      var error = error.response.data.errors;
      if (error.email) {
        for (const item of error.email) {
          Swal.fire("ERROR!", item, "error");
        }
      }
    });
}
