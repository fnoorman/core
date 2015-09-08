function contestButton_click() 
{
    document.getElementById('contest_frame').style.display = 'block';
    document.getElementById('review_frame').style.display = 'none';
    document.getElementById('videoimage_frame').style.display = 'none';
}
function reviewButton_click() 
{
    document.getElementById('contest_frame').style.display = 'none';
    document.getElementById('review_frame').style.display = 'block';
    document.getElementById('videoimage_frame').style.display = 'none';
}
function videoButton_click() 
{
    document.getElementById('contest_frame').style.display = 'none';
    document.getElementById('review_frame').style.display = 'none';
    document.getElementById('videoimage_frame').style.display = 'block';
}   

    window.onload = codeAddress;