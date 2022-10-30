let xmlhttp = new XMLHttpRequest();

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