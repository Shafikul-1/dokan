

// Image Change
function changeImage(event) {
  // console.log(event.srcElement.currentSrc);
  const getUrl = event.srcElement.currentSrc;
  const changeImageSrc = (document.querySelector(".changeImageSrc").src =
    getUrl);
}

// Zoom Image
function zoomImage(event) {
  const currentUrl = event.srcElement.currentSrc;
  const zoomDiv = document.querySelector(".zoomDiv");
  zoomDiv.style.backgroundImage = `url('${currentUrl}')`;
  zoomDiv.style.display = "block";
  let img = document.getElementById("imgZoom");
  let imgRect = img.getBoundingClientRect();
  let posX = event.clientX - imgRect.left;
  let posY = event.clientY - imgRect.top;
  const zoomLevel = 2;

  zoomDiv.style.backgroundSize = `${img.width * zoomLevel}px ${
    img.height * zoomLevel
  }px`;
  zoomDiv.style.backgroundPosition = `${-posX * (zoomLevel - 1)}px ${
    -posY * (zoomLevel - 1)
  }px`;
}
// Zoom Out Image
function zoomOutImage() {
  const zoomDiv = document.querySelector(".zoomDiv");
  zoomDiv.style.display = "none";
}

const InformationShow = document.querySelector(".InformationShow");
const commentShow = document.querySelector(".commentShow");

function showinformation() {
  InformationShow.classList.remove("hidden");
  commentShow.classList.add("hidden");
}

function showComment() {
  commentShow.classList.remove("hidden");
  InformationShow.classList.add("hidden");
}

