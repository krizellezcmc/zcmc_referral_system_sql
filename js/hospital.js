$("#code").on("input", function () {
  $.ajax({
    type: "POST",
    url: "../../server/check_code.php",
    data: { code: $("#code").val(), hospital: $("#detailHospi").val() },
    success: function (response) {
      var res = $.parseJSON(response);

      if (res === "Proceed") {
        $("#code").prop("disabled", true);
        $("#detailHospi").prop("disabled", true);
        $("#patientInfo").css("display", "block");
        $("#errorMessage").css("display", "none");
      } else {
        $("#errorMessage").css("display", "block");
      }
    },
  });
});
