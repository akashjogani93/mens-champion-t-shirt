document.getElementById('files').onchange = function handleImage(e) {
var reader = new FileReader();
reader.onload = function (event) {
var imgObj = new Image();
imgObj.src = event.target.result;
29
imgObj.onload = function () {
var image = new fabric.Image(imgObj);
image.set({
angle: 0,
padding: 10,
cornersize: 10,
left: canvasobject.width / 2,
top: canvasobject.height / 2,
scaleY: canvasobject.height / image.width,
scaleX: canvasobject.width / image.width,
});
canvasobject.centerObject(image);
canvasobject.add(image);
canvasobject.renderAll();
designpricetotal += 5
myDiv.innerHTML = "$" + designpricetotal;
totalprice += 5;
myDiv2.innerHTML = "$" + totalprice;
}
}
reader.readAsDataURL(e.target.files[0]);
}
