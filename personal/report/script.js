function generarPDF(){
    const element = document.getElementById("test");
    html2pdf().from(element).save();
}