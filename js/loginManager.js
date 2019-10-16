var loginManager = {
    showLogin : function(){
        var modal = document.getElementById("modal-content");
        modal.innerHTML = loginForm.innerHTML;
        modalManager.showModal();
    },
    hideLogin : function(){
        var mf = document.getElementById("modal-form");
        mf.classList.add("hidden");
    },
    logout : function(){
        window.location.href = "lib/logout.php";
    }
};
