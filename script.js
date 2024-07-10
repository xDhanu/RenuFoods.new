function changeView() {
    var signUpBox = document.getElementById("login");
    var signInBox = document.getElementById("registar");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function registar() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("u", username.value);
    f.append("p", password.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Registration Success!";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                username.value = "";
                password.value = "";

                setTimeout(function () {
                    var signUpBox = document.getElementById("login");
                    var signInBox = document.getElementById("registar");

                    signInBox.classList.toggle("d-none");
                    signUpBox.classList.toggle("d-none");
                }, 1000);

            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msg1").className = "alert alert-danger";
                document.getElementById("msgDiv1").className = "d-block";
            }
        }
    }

    request.open("POST", "registationProcess.php", true);
    request.send(f);

}

function showPasswordregistar() {

    var input = document.getElementById("password");
    var icon = document.getElementById("passwordIcon");

    if (input.type == "password") {
        input.type = "text";
        icon.className = "bi bi-eye text-danger";
    } else {
        input.type = "password";
        icon.className = "bi bi-eye-slash text-primary";
    }

}

function logIn() {

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("rm");

    var f = new FormData();

    f.append("u", un.value);
    f.append("p", pw.value);
    f.append("r", rm.checked);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                window.location = "index.php";
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block"
            }
        }
    }

    request.open("POST", "loginProcess.php", true);
    request.send(f);

}


function showPasswordRegistation() {

    var input = document.getElementById("pw");
    var icon = document.getElementById("pwi");

    if (input.type == "password") {
        input.type = "text";
        icon.className = "bi bi-eye text-danger";
    } else {
        input.type = "password";
        icon.className = "bi bi-eye-slash text-primary";
    }

}

function adminLogIn() {

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");

    var f = new FormData();

    f.append("u", un.value);
    f.append("p", pw.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {

                document.getElementById("msg").innerHTML = "Registration Success!";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";

                setTimeout(function () {
                    window.location = "adminPanel.php"
                }, 1000);

            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
            }
        }
    }

    request.open("POST", "adminLogInProcess.php", true);
    request.send(f);

}

function navbarActive() {
    var menu = document.getElementById("menu");
    var navbar = document.getElementById("Navbar");

    navbar.classList.toggle("Active");
}

function loadUser() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            document.getElementById("utb").innerHTML = response;
        }
    }

    request.open("POST", "adminLoadUserProcess.php", true);
    request.send();
}

function updateUserStatus(id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var txt = request.responseText;
            if (txt == "deactivated") {
                document.getElementById("active" + id).innerHTML = "Active";
                document.getElementById("active" + id).classList = "checked";

                document.getElementById("msg").innerHTML = "User Deactivate Succesfully";
                document.getElementById("msg").className = "alert alert-warning";
                document.getElementById("msgDiv").className = "d-block";

                setTimeout(function () {
                    msgDiv.classList.toggle("d-none");
                }, 1000);

                loadUser();

            } else if (txt == "activated") {
                document.getElementById("deactive" + id).innerHTML = "Deactive";
                document.getElementById("deactive" + id).classList = "default";

                document.getElementById("msg").innerHTML = "User Activate Succesfully";
                document.getElementById("msg").className = "alert alert-warning";
                document.getElementById("msgDiv").className = "d-block";

                setTimeout(function () {
                    msgDiv.classList.toggle("d-none");
                }, 1000);

                loadUser();

            } else {

                document.getElementById("msg").innerHTML = txt;
                document.getElementById("msgDiv").className = "d-block";

                setTimeout(function () {
                    msgDiv.classList.toggle("d-none");
                }, 1000);

            }
        }
    }

    request.open("GET", "adminUpdateUserStatusProcess.php?id=" + id, true);
    request.send();
}

function reload() {
    location.reload();
}

function brandReg() {

    var brand = document.getElementById("brand");
    var msgDiv1 = document.getElementById("msgDiv1");

    var f = new FormData();
    f.append("b", brand.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Brand Registration Successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";
                brand.value = "";

                setTimeout(function () {
                    msgDiv1.classList.toggle("d-none");
                }, 1000);

            } else {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msgDiv1").className = "d-block";

                setTimeout(function () {
                    msgDiv1.classList.toggle("d-none");
                }, 1000);
            }
        }
    }

    request.open("POST", "adminBrandRegisterProcess.php", true);
    request.send(f);
}

function catReg() {

    var category = document.getElementById("category");
    var msgDiv2 = document.getElementById("msgDiv2");

    var f = new FormData();
    f.append("c", category.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg2").innerHTML = "Category Registration Successfully";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";
                category.value = "";

                setTimeout(function () {
                    msgDiv2.classList.toggle("d-none");
                }, 1000);

            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";

                setTimeout(function () {
                    msgDiv2.classList.toggle("d-none");
                }, 1000);
            }
        }
    }

    request.open("POST", "adminCategoryRegisterProcess.php", true);
    request.send(f);
}

function gradeReg() {

    var color = document.getElementById("grade");
    var msgDiv3 = document.getElementById("msgDiv3");


    var f = new FormData();
    f.append("grade", grade.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg3").innerHTML = "Grade Registration Successfully";
                document.getElementById("msg3").className = "alert alert-success";
                document.getElementById("msgDiv3").className = "d-block";
                grade.value = "";

                setTimeout(function () {
                    msgDiv3.classList.toggle("d-none");
                }, 1000);

            } else {
                document.getElementById("msg3").innerHTML = response;
                document.getElementById("msgDiv3").className = "d-block";

                setTimeout(function () {
                    msgDiv3.classList.toggle("d-none");
                }, 1000);

            }
        }
    }

    request.open("POST", "adminGradeRegisterProcess.php", true);
    request.send(f);
}

function sizeReg() {

    var size = document.getElementById("size");
    var msgDiv4 = document.getElementById("msgDiv4");

    var f = new FormData();
    f.append("size", size.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg4").innerHTML = "Size Registration Successfully";
                document.getElementById("msg4").className = "alert alert-success";
                document.getElementById("msgDiv4").className = "d-block";
                size.value = "";

                setTimeout(function () {
                    msgDiv4.classList.toggle("d-none");
                }, 1000);

            } else {
                document.getElementById("msg4").innerHTML = response;
                document.getElementById("msgDiv4").className = "d-block";

                setTimeout(function () {
                    msgDiv4.classList.toggle("d-none");
                }, 1000);

            }
        }
    }

    request.open("POST", "adminSizeRegisterProcess.php", true);
    request.send(f);
}

function regProduct() {

    var pname = document.getElementById("pname");
    var brand = document.getElementById("brand");
    var cat = document.getElementById("cat");
    var grade = document.getElementById("grade");
    var size = document.getElementById("size");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");

    var form = new FormData();
    form.append("pname", pname.value);
    form.append("brand", brand.value);
    form.append("cat", cat.value);
    form.append("grade", grade.value);
    form.append("size", size.value);
    form.append("desc", desc.value);
    form.append("image", file.files[0]);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                document.getElementById("msg").innerHTML = "Product Registration Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                pname.value = "";
                brand.value = "";
                cat.value = "";
                grade.value = "";
                size.value = "";
                desc.value = "";

                setTimeout(function () {
                    msgDiv.classList.toggle("d-none");
                }, 1000);

            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";

                setTimeout(function () {
                    msgDiv.classList.toggle("d-none");
                }, 1000);

            }
        }
    }

    request.open("POST", "adminProductRegistrationProcess.php", true);
    request.send(form);
}

function updateStock() {
    var pname = document.getElementById("selectProduct");
    var price = document.getElementById("uprice");
    var qty = document.getElementById("qty");


    // alert(pname.value);

    var f = new FormData();
    f.append("p", pname.value);
    f.append("q", qty.value);
    f.append("up", price.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            if (alert = response) {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";
                
                
                setTimeout(function () {
                    msgDiv1.classList.toggle("d-none");
                }, 1000);

                reload();

            }
        };
    }

    request.open("POST", "adminUpdateStockProcess.php", true);
    request.send(f);
}

function updateDeliveryFee() {
    var delivery = document.getElementById("delivery");
    // alert(delivery.value);

    var f = new FormData();
    f.append("df", delivery.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (alert = response) {
                document.getElementById("msg1").innerHTML = response;
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";

                setTimeout(function () {
                    msgDiv1.classList.toggle("d-none");
                }, 1000);

            }
        }
    }

    request.open("POST", "updateDeliveryFee.php", true);
    request.send(f);

}

function printdiv() {

    var originalContent = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    document.body.innerHTML = printArea;

    window.print();

    document.body.innerHTML = originalContent;
}

function adminLogOut() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            alert(response);
            reload();
            window.location = "adminLogin.php";
        }
    }

    request.open("POST", "adminLogoutProcess.php", true);
    request.send();
}

function loadProductstts() {

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;

            document.getElementById("ptb").innerHTML = response;
        }
    }

    request.open("POST", "adminLoadProductProcess.php", true);
    request.send();
}

function updateProductStatus(stock_id) {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            var txt = request.responseText;
            if (txt == "deactivated") {
                document.getElementById("active" + stock_id).innerHTML = "Active";
                document.getElementById("active" + stock_id).classList = "checked";

                document.getElementById("msg").innerHTML = "Product Deactivate Succesfully";
                document.getElementById("msg").className = "alert alert-warning";
                document.getElementById("msgDiv").className = "d-block";

                setTimeout(function () {
                    msgDiv.classList.toggle("d-none");
                }, 1000);

                loadProductstts();

            } else if (txt == "activated") {
                document.getElementById("deactive" + stock_id).innerHTML = "Deactive";
                document.getElementById("deactive" + stock_id).classList = "default";

                document.getElementById("msg").innerHTML = "Product Activate Succesfully";
                document.getElementById("msg").className = "alert alert-warning";
                document.getElementById("msgDiv").className = "d-block";

                setTimeout(function () {
                    msgDiv.classList.toggle("d-none");
                }, 1000);

                loadProductstts();

            } else {

                document.getElementById("msg").innerHTML = txt;
                document.getElementById("msgDiv").className = "d-block";

                setTimeout(function () {
                    msgDiv.classList.toggle("d-none");
                }, 1000);

            }
        }
    }

    request.open("GET", "adminUpdateProductStatusProcess.php?stock_id=" + stock_id, true);
    request.send();
}

// User Side

function loadProduct(x) {
    var page = x;
    // alert(x);

    var f = new FormData();
    f.append("p", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    }

    request.open("POST", "userLoadProductProcess.php", true);
    request.send(f);

}

function searchProduct(x) {
    var page = x;
    var search = document.getElementById("search");

    // alert(page);
    // alert(product.value);

    var f = new FormData();
    f.append("pg", page);
    f.append("se", search.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    };

    request.open("POST", "userSearchProductProcess.php", true);
    request.send(f);

}

function viewFilter() {
    var view = document.getElementById("filter");

    view.classList.toggle("d-block");
    view.classList.toggle("d-none");
}

function advSearchProduct(x) {

    var page = x;
    var grade = document.getElementById("grade");
    var cat = document.getElementById("cat");
    var brand = document.getElementById("brand");
    var size = document.getElementById("size")
    var min = document.getElementById("min");
    var max = document.getElementById("max");

    var f = new FormData();
    f.append("gr", grade.value);
    f.append("cat", cat.value);
    f.append("b", brand.value);
    f.append("s", size.value);
    f.append("min", min.value);
    f.append("max", max.value);
    f.append("pg", page);


    var request = new XMLHttpRequest();

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;

            grade.value = "0";
            cat.value = "0";
            brand.value = "0";
            size.value = "0";
            min.value = "";
            max.value = "";
        }
    };

    request.open("POST", "userAdvSearchProcess.php", true);
    request.send(f);

}

function uploadProfileimg() {
    var img = document.getElementById("profileimg");

    var f = new FormData();
    f.append("i", img.files[0]);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            if (response == `empty`) {
                alert("Please select your profile Image")
            } else {
                document.getElementById("i").src = response;
                img.value = "";
                reload();

            }
        }

    }

    request.open("POST", "userProfileImgUploadingProcess.php", true);
    request.send(f);
}

function updateProfileData() {

    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var pw = document.getElementById("pw");
    var no = document.getElementById("no");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");

    var f = new FormData();

    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("p", pw.value);
    f.append("n", no.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                document.getElementById("msg").innerHTML = "Profile Update Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";

                setTimeout(function () {
                    msgDiv.classList.toggle("d-none");
                }, 1500);

            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";

                setTimeout(function () {
                    msgDiv.classList.toggle("d-none");
                }, 1500);

            }
        }
    }

    request.open("POST", "userProfileDataUploadingProcess.php", true);
    request.send(f);
}

function showPasswordProfule() {

    var input = document.getElementById("pw");
    var icon = document.getElementById("passwordIcon");

    if (input.type == "password") {
        input.type = "text";
        icon.className = "bi bi-eye text-danger";
    } else {
        input.type = "password";
        icon.className = "bi bi-eye-slash text-primary";
    }

}

function userLogOut() {

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            alert(response);
            window.location = "index.php";
        }
    }

    request.open("POST", "userLogoutProcess.php", true);
    request.send();
}

function addtoCart(x) {

    // alert(x);

    var stockId = x;
    var qty = document.getElementById("qty");

    if (qty.value > 0) { //not = empty
        //alert("OK");

        var f = new FormData();
        f.append("s", stockId);
        f.append("q", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                // alert(response);
                swal("Success!", response, "success");
                qty.value = "";
            }
        }

        request.open("POST", "userAddToCartProcess.php", true);
        request.send(f);

    } else {
        // alert("Please Enter Your Quantity");
        swal("Faild!", "Please Enter Your Quantity!", "info");
    }

}

function loadCart() {
    //alert("OK");

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            document.getElementById("cartBody").innerHTML = response;
        }
    }

    request.open("POST", "userLoadCartProcess.php", true);
    request.send();
}

function incrementCartQty(x) {

    //alert(x);

    var cardId = x;
    var qty = document.getElementById("qty" + x);
    //alert(qty.value);

    var newQty = parseInt(qty.value) + 1; //integer
    //alert(newQty);

    var f = new FormData();
    f.append("c", cardId);
    f.append("q", newQty);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);

            if (response == "Success") {
                qty.value = parseInt(qty.value) + 1;
                loadCart();
            } else {
                alert(response);
            }
        }
    }

    request.open("POST", "userChangeCartQtyPrice.php", true);
    request.send(f);


}

function decrementCartQty(x) {
    //alert(x);

    var cardId = x;
    var qty = document.getElementById("qty" + x);

    var newQty = parseInt(qty.value) - 1; //integer
    //alert(newQty);

    var f = new FormData();
    f.append("c", cardId);
    f.append("q", newQty);

    if (newQty > 0) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 & request.status == 200) {
                var response = request.responseText;
                //alert(response);

                if (response == "Success") {
                    qty.value = parseInt(qty.value) - 1;
                    loadCart();
                } else {
                    alert(response);
                }
            }
        }

        request.open("POST", "userChangeCartQtyPrice.php", true);
        request.send(f);
    }


}

function removeCart(x) {
    //alert(x);

    var f = new FormData();
    f.append("c", x);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            swal("Deleted!", response, "success");

            setTimeout(function () {
                reload();
            }, 2500);

        }
    }

    request.open("POST", "userRemoveCartItemProcess.php", true);
    request.send(f);



}

function checkout() {
    // alert("ok");

    var f = new FormData();
    f.append("cart", true) //me vidiyata apita puluwan cart ekenmada me req eka enne kiyala check karaganna.

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
            var payment = JSON.parse(response);
            doCheckout(payment, "userCheckoutProcess.php")
        }
    }

    request.open("POST", "userPaymentProcess.php", true);
    request.send(f);
}

function doCheckout(payment, path) {

    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;

                var orderorderResp = JSON.parse(response);

                if (orderorderResp.response == "Success") {
                    // reload();
                    window.location = "userInvoice.php?orderId=" + orderorderResp.order_id;
                } else {
                    alert(response);
                }
            }
        }

        request.open("POST", path, true);
        request.send(f);
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:" + error);
    };

    // Show the payhere.js popup, when "PayHere Pay" is clicked
    // document.getElementById('payhere-payment').onclick = function (e) {
    payhere.startPayment(payment);
};

function buyNow(stock_id) {
    // alert(stock_id);
    var qty = document.getElementById("qty");

    if (qty.value > 0) {
        // alert("ok");
        var f = new FormData();
        f.append("cart", false);
        f.append("stock_id", stock_id);
        f.append("qty", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                // alert(response);
                var payment = JSON.parse(response);
                payment.stock_id = stock_id;
                payment.qty = qty.value;
                doCheckout(payment, "userBuyNowProcess.php");
            }
        };

        request.open("POST", "userPaymentProcess.php", true);
        request.send(f);
    } else {
        alert("Please Enter Valid Qty");
    }

}

var forgotPasswordModal;
function forgotPassword() {

    var un = document.getElementById("un").value;

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response == "success") {
                // alert("Email sent successfully. Check your Inbox.");
                swal("Check Your Email!", "Email sent successfully. Check your Inbox.", "success");
                var modal = document.getElementById("fpmodal");
                forgotPasswordModal = new bootstrap.Modal(modal);
                forgotPasswordModal.show();
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
            }
        }
    }

    request.open("GET", "userForgetPasswordProcess.php?un=" + un, true);
    request.send();

}

function showModelPw1() {

    var textfield = document.getElementById("np");
    var icon = document.getElementById("npi");

    if (textfield.type == "password") {
        textfield.type = "text";
        icon.className = "bi bi-eye-slash";
    } else {
        textfield.type = "password";
        icon.className = "bi bi-eye";
    }

}

function showModelPw2() {

    var textfield = document.getElementById("rnp");
    var icon = document.getElementById("rnpi");

    if (textfield.type == "password") {
        textfield.type = "text";
        icon.className = "bi bi-eye-slash";
    } else {
        textfield.type = "password";
        icon.className = "bi bi-eye";
    }

}

function resetUserPassword() {

    var email = document.getElementById("un");
    var newPassword = document.getElementById("np");
    var confoirmPassword = document.getElementById("rnp");
    var verificationCode = document.getElementById("vcode");

    var form = new FormData();
    form.append("un", email.value);
    form.append("n", newPassword.value);
    form.append("r", confoirmPassword.value);
    form.append("v", verificationCode.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 && request.readyState == 4) {
            var response = request.responseText;
            if (response == "Success") {
                swal("Done!", "Password Reset successfully.", "success");
                forgotPasswordModal.hide();
            } else {
                swal("Somthing went Wrong!", response, "danger");
            }
        }
    }

    request.open("POST", "UserResetPasswordProcess.php", true);
    request.send(form);

}

function SoldPrdct() {

    var ctx = document.getElementById('mstsold');

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);

            var data = JSON.parse(response);

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: data.labels,
                    datasets: [{
                        label: '# of Votes',
                        data: data.data,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        };
    }
    request.open("POST", "adminLoadChartMostSoldProductProcess.php", true);
    request.send()
}

function loadChart() {
    var ctx = document.getElementById("history");
    var f = new FormData();
    f.append("ctx", ctx.value);
    var r = new XMLHttpRequest();
    r.onreadystatechange = function () {
        if (r.readyState == 4 && r.status == 200) {
            var t = r.responseText;
            var data = JSON.parse(t);

            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: data.dates,
                    datasets: [{
                        label: 'Daily Income',
                        data: data.incomes,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            document.getElementById("total-amount").innerHTML = "Total Amount: " + 
            data.total_amount;
        }
    }

    r.open("POST", "adminLoadChartIncomeHistoryProcess.php", true);
    r.send(f);
}

var cam;
function contactAdmin() {
    var m = document.getElementById("contactAdmin");
    cam = new bootstrap.Modal(m);
    cam.show();
}

function sendAdminMsg() {
    var txt = document.getElementById("msgtxt");

    var form = new FormData();
    form.append("t", txt.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.status == 200 & request.readyState == 4) {
            var response = request.responseText;
            alert(response);
        }
    }

    request.open("POST", "userSendAdminMsgProcess.php", true);
    request.send(form);

}