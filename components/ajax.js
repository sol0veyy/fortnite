let xmlhttp = new XMLHttpRequest();

// Обработка лайков
function upLikes(colArticle) {
    let colLikes = document.getElementById("colLikes"+colArticle);
    let like = document.getElementById("like"+colArticle);

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            colLikes.innerHTML = this.responseText;
            like.classList.toggle('like-on');
        }
    }
    let idArticle = colLikes.dataset.idarticle;
    xmlhttp.open("GET", "../vendor/likes.php?idArticle=" + idArticle, true);
    xmlhttp.send();
}

// Обработка подписчиков
function upSub(colCom) {
    let colSub = document.getElementById("colSub"+colCom);

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            colSub.innerHTML = this.responseText;
        }
    }
    let idCom = colSub.dataset.idcom;
    console.log(idCom);
    xmlhttp.open("GET", "../vendor/sub.php?idCom=" + idCom, true);
    xmlhttp.send();
}