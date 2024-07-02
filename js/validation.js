function show_name(value) {
  //   console.log(value);
  var nameRegex =
    /^([a-zA-Z\u00c0-\u00d6\u00d8-\u00f6\u00f8-\u00ff][a-zA-Z\u00c0-\u00d6\u00d8-\u00f6\u00f8-\u00ff ',.-]*)+$/;
  if (!nameRegex.test(value)) {
    $("#name").css("border", "1px solid red");
  } else {
    $("#name").css("border", "1px solid #ced4da");
  }

  if (value.length == "" || value.length == null) {
    $("#name").css("border", "1px solid #ced4da");
    $("#name").focus();
  }
}
function checkEmail(value) {
  var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!emailRegex.test(value)) {
    $("#email").css("border", "1px solid red");
  } else {
    $("#email").css("border", "1px solid #ced4da");
  }

  if (value.length == null || value.length == "") {
    $("#email").css("border", "1px solid #ced4da");
    $("#email").focus();
  }
}

function checkValidateMobile(input) {
  console.log(input);
  // var regex = /^[0-9]*$/;
  var regex = /^[0-9]{10}$/;
  if (!regex.test(input) || input.length > 10) {
    $("#number").css("border", "1px solid red");
    $("#number").focus();
  } else {
    $("#number").css("border", "1px solid #ced4da");
    $("#number").focus();
  }

  if (input.length == null || input.length == "") {
    $("#number").css("border", "1px solid #ced4da");
    $("#mobile").focus();
  }
}

$(document).ready(function () {
  $("#submit").click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    var name = $("#name").val();
    var nameRegex =
      /^([a-zA-Z\u00c0-\u00d6\u00d8-\u00f6\u00f8-\u00ff][a-zA-Z\u00c0-\u00d6\\u00d8-\u00f6\u00f8-\u00ff ',.-]*)+$/;
    var phone_number = $("#number").val();
    var phone_length = $("#number").val().length;
    var email = $("#email").val();
    var email_length = $("#email").val().length;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var total_passenger = $("#travelers").val();
    var destination = $("#destination").val();
    var cruiselength = $("#cruise-length").val();
    var depart_date = $("#depart_date").val();
    var cruiseline = $("#cruise-line").val();
    var cruiseship = $("#cruise-ship").val();
    var departureport = $("#departure-port").val();
    var ErrorMsg = false;

    //* Name
    if (name == "" || name == null || name == undefined) {
      $(".error_1").show();
      ErrorMsg = true;
    } else if (nameRegex.test(name) == false) {
      $(".error_1").html("Please Enter correct name*");
      $(".error_1").show();
    } else {
      $(".error_1").hide();
    }

    // * phone
    if (
      phone_number == "" ||
      phone_number == undefined ||
      phone_number == null
    ) {
      $(".error_3").show();
      ErrorMsg = true;
    } else if (phone_length != 10 || !/^\d{10}$/.test(phone_number)) {
      $(".error_3").html("Please enter a valid 10 digit phone number.");
      $(".error_3").show();
      ErrorMsg = true;
    } else {
      $(".error_3").hide();
    }

    //*Email
    if (email_length != 0 && emailRegex.test(email) == false) {
      $(".error_2").show();
    } else {
      $(".error_2").hide();
    }

    //* traveler
    if (
      total_passenger == "" ||
      total_passenger == null ||
      total_passenger == undefined
    ) {
      $(".error_4").show();
      ErrorMsg = true;
    } else {
      $(".error_4").hide();
    }

    //* destination
    if (destination == "" || destination == null || destination == undefined) {
      $(".error_5").show();
    } else {
      $(".error_5").hide();
    }

    //*Cruise length
    if (
      cruiselength == "" ||
      cruiselength == null ||
      cruiselength == undefined
    ) {
      $(".error_6").show();
    } else {
      $(".error_6").hide();
    }

    //* return and depart date
    if (depart_date == "" || depart_date == null || depart_date == undefined) {
      $(".error_7").show();
      ErrorMsg = true;
    } else {
      $(".error_7").hide();
    }

    //*cruiseline
    if (cruiseline == "" || cruiseline == null || cruiseline == undefined) {
      $(".error_8").show();
    } else {
      $(".error_8").hide();
    }

    //* cruise Ship
    if (cruiseship == "" || cruiseship == null || cruiseship == undefined) {
      $(".error_9").show();
    } else {
      $(".error_9").hide();
    }

    //*departureport
    if (
      departureport == "" ||
      departureport == null ||
      departureport == undefined
    ) {
      $(".error_10").show();
    } else {
      $(".error_10").hide();
    }

    if (!ErrorMsg) {
      $("#cruiseForm").submit();
    }
  });

  $("#number_of_adults").change(function () {
    let selectedValue = $(this).val();
    $("#number_of_infant").empty();
    for (var i = 0; i <= selectedValue; i++) {
      $("#number_of_infant").append(
        '<option value="' + i + '">' + i + "</option>"
      );
    }
  });
});

$(function () {
  $("#depart_date").daterangepicker({
    minDate: new Date(),
    autoApply: true,
    autoUpdateInput: false,
    autoclose: true,
  });
  $("#depart_date").on("apply.daterangepicker", function (ev, picker) {
    $(this).val(picker.startDate.format("YYYY-MM-DD"));
  });
});

function select_traveler(val) {
  // console.log(val);
  if (val) {
    $(".travelers_radio").show();
    $("#text").text(val + ` Adult `);
  }
}

function pax_travler(val) {
  var totalpass = $("#travelers").val();
  if (val == "yes") {
    $("#number_of_adults").val(totalpass);
    $("#pax_travler").hide();
  } else if (val == "no") {
    $("#pax_travler").show();
  }
}
