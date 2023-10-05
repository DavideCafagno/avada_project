<div class="container-md rounded border-2 border-secondary p-4 ">
    <form action="../#" method="post" class="needs-validation row" id="registerForm">
        <div class="col-12 col-sm-4  my-2">
            <label for="registerName" class="form-label">Nome</label>
            <input type="text" oninput="validate(this)" onblur="upper(this)"
                   class="form-control shadow-sm border border-1 " aria-describedby="nomeprepend" id="registerName"
                   required>
            <div class="valid-feedback">Name is valid.</div>
            <div class="invalid-feedback ">Insert valid name.</div>
        </div>
        <div class="col-12 col-sm-4 my-2">
            <label for="registerSurname" class="form-label">Cognome</label>
            <input type="text" oninput="validate(this)" onblur="upper(this)"
                   class="form-control shadow-sm border border-1 " id="registerSurname" required>
            <div class="valid-feedback">Surname is valid</div>
            <div class="invalid-feedback">Insert valid surname.</div>
        </div>
        <div class="col-12 col-sm-4 my-2">
            <label for="registerEmail" class="form-label">Email</label>
            <input type="email" class="form-control shadow-sm border border-1 " id="registerEmail" required>
            <div class="valid-feedback">Email is valid</div>
            <div class="invalid-feedback">Insert valid Email.</div>
        </div>
        <div class="col-12 col-sm-4 my-2">
            <label for="registerFacebook" class="form-label">Profilo Facebook</label>
            <input type="text" class="form-control shadow-sm border border-1 " id="registerFacebook">
            <div class="valid-feedback">Facebook not is required</div>
        </div>
        <div class="col-12 col-sm-4 my-2">
            <label for="registerTelephone" class="form-label">Numero Telefono</label>
            <input type="text" oninput="validatePhone(this)" class="form-control shadow-sm border border-1 "
                   id="registerTelephone">
            <div class="valid-feedback">Telephone not is required</div>
        </div>
        <div class="col-12 my-5"></div>
        <div class="col-12 col-sm-4 my-2">
            <label for="registerTangoRole" class="form-label">Ruolo di coppia</label>
            <select class="form-select form-select form-control shadow-sm border border-1 " id="registerTangoRole"
                    required>
                <option selected value="" disabled> -</option>
                <option value="Seguo">Seguo</option>
                <option value="Guido">Guido</option>
            </select>
            <div class="valid-feedback">Tango role selected.</div>
            <div class="invalid-feedback">Select valid Tango role.</div>
        </div>
        <div class="col-12 "></div>
        <div class="col-12 col-sm-4 my-2">
            <label for="registerPartner" class="form-label">Nome Partner</label>
            <input type="text" oninput="validate(this)" onblur="upper(this)"
                   class="form-control shadow-sm border border-1 " id="registerPartner">
            <div class="valid-feedback">Partner name not is required</div>

        </div>


        <div class="col-12 mt-5 aligncenter">
            <button class="btn btn-primary btn-lg px-5 mt-5" type="submit" onclick="check()">REGISTRATI</button>
        </div>
    </form>
</div>


<script>
    function check() {
        let event = this.event;
        let form = document.getElementById('registerForm');
        form.classList.add('was-validated');
        if (!form.checkValidity()) {
            event.preventDefault();
            event.stopPropagation();
        } else {
            // event.preventDefault();
            // event.stopPropagation();
            let tangouser = {};
            tangouser.name = form.elements['registerName'].value;
            tangouser.surname = form.elements['registerSurname'].value;
            tangouser.email = form.elements['registerEmail'].value;
            tangouser.facebook = form.elements['registerFacebook'].value;
            tangouser.telephone = form.elements['registerTelephone'].value;
            tangouser.tangoRole = form.elements['registerTangoRole'].value;
            tangouser.partner = form.elements['registerPartner'].value;
            event.preventDefault();
            event.stopPropagation();
            jQuery.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                dataType:'json',
                method:'post',
                data:{tangouser:tangouser, action:'tango_user_registration', tangononce: '<?php echo wp_create_nonce(); ?>'},
                success:function(response){
                    console.log(response);
                    if(response.status === 200){
                        alert(response.data);
                    }else{
                        alert(response.data);
                    }

                }
            });
        }
    }

    function upper(element) {
        let val = element.value;
        element.value = "";
        val.split(' ').forEach((str) => {
            element.value += str.charAt(0).toUpperCase() + str.substring(1, str.length).toLowerCase() + " ";
        });
        element.value = element.value.trim();
    }

    function validate(element) {
        if (element.value === " ") {
            element.value = "";
        } else {
            element.value = element.value.replaceAll("  ", " ");

            if (/[0-9/*-+=.:;"|!"£$%#§&/()\[\]{}@=?^|\\]/.test(element.value)) {
                element.setCustomValidity("Invalid field.")
                element.title = "Campo obbligatiorio, caratteri speciali e numeri non ammessi";
            } else {
                element.setCustomValidity("");
                element.title = "";
            }
        }
    }

    function validatePhone(element) {
        if (element.value === " ") {
            element.value = "";
        } else {
            element.value = element.value.replaceAll("  ", " ");
        }
        let val = element.value;
        let tmp = val;
        for (let i = 0; i < val.length; i++) {
            if(isNaN(val.charAt(i)) ){
                tmp = ""+tmp.replace(val.charAt(i),"");
            }
        }
        element.value = tmp;
    }
</script>
