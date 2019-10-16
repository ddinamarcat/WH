class ArticleSlide{
    constructor(listId){
        this.listId = listId;
        this.artLock = null;
        this.pos = 0;
    }
    start(){
        var as = this;
        this.artLock = new AnimationLock();
        this.list = document.getElementById(this.listId);
        this.pos = 0;
        this.total = this.list.children.length;
        this.list.children[this.pos].classList.remove("oculto");
        this.list.children[this.pos].classList.add("mostrar");
        window.setTimeout(function(){
            as.automaticChange();

        },8000);
    }
    stop(){
        this.artLock.lock = 0;
    }
    automaticChange(){
        if(this.artLock.lock != 1) return;
        var lp = this.list;
        var actual = lp.children[this.pos];
        var as = this;
        if(actual){
            //hide actual event
            actual.classList.add("oculto");
            actual.classList.remove("mostrar");
            //change to the next event and add it
            this.pos = (this.pos+1)%this.total;
            actual = lp.children[this.pos];

            window.setTimeout(function(){

                actual.classList.remove("oculto");
                actual.classList.add("mostrar");

            },200);
        }
        else{
            lp.children[this.pos].classList.remove("oculto");
            lp.children[this.pos].classList.add("mostrar");
        }

        window.setTimeout(function(){
            as.automaticChange();

        },8000);

    }
    next(){
        this.artLock.lock += 1;
        var lp = this.list;
        var actual = lp.children[this.pos];
        var as = this;
        if(!actual.classList.contains("oculto"))actual.classList.add("oculto");
        if(actual.classList.contains("mostrar"))actual.classList.remove("mostrar");

        this.pos = (this.pos+1)%this.total;
        actual = lp.children[this.pos];

        window.setTimeout(function(){
            if(!actual.classList.contains("mostrar"))actual.classList.add("mostrar");
            if(actual.classList.contains("oculto"))actual.classList.remove("oculto");

        },200);
        window.setTimeout(function(){
            as.artLock.lock -= 1;
            as.automaticChange();

        },8000);
    }
}
