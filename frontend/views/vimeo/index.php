<?php
/* @var $this yii\web\View */
?>
<div class="container">
    <div class="page-header">
        <h1>Vimeo Upload</h1>
    </div>
    <div id="vid">

    </div>
    <div class="row" id="videoDetail">
        <div class="col-lg-6">
            <dl class="dl-horizontal">
                <dt>Title</dt>
                <dd id="videoTitle"> Untitled</dd>
                <dt>Description</dt>
                <dd id="videoDescription"> No description</dd>
            </dl>
        </div>
        <div class="col-lg-6">
            <form id="form-patch">
                <div class="form-group">
                    <input type="text" class="form-control" id="inputVideoTitle" placeholder="Title">
                </div>
                <div class="form-group">
                    <textarea class="form-control" id="inputVideoDescription" placeholder="Description" rows="3"></textarea>
                </div>
                <button type="button" class="btn btn-primary btn-success active" id="patchVideo">Update Video Information</button>
            </form>
        </div>
    </div>



    <div>
        <input type="text" id="vimeoVideoId"/>
        <input type="text" id="vimeoCurrentStatus"/>
    </div>


    <br>

    <div id="action" class="hidden">
        <button  class="btn btn-primary btn-default active" onclick="stopUpload();" id="stopUpload">Stop upload</button>
    </div>

    <div class="checkbox">
        <label>
            <input type="checkbox" id="upgrade_to_1080" name="upgrade_to_1080" value="yes"> Upgrade to 1080 </input>
        </label>
    </div>
    <input type="hidden" id="videoId" value="">

    <br>
    <div id="status">

    </div>

    <br>

    <div class="progress hidden" id="progressElement">
        <div id="progress" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="46" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
            0%
        </div>
    </div>
    <div id="drop_zone">Drop files here</div>
    <br>
    <div id="results"></div>

</div>



<footer class="footer">
    <div class="container">
        <p class="text-muted"><a href="http://websemantics.ca">WebSemantics, Inc.</a></p>
    </div>
</footer>

<script src="js/upload.js"></script>
<script type="text/javascript">

    document.body.addEventListener('UploadingCompleted',checkVideoAvailibility,false);
    var patchButton = document.getElementById('patchVideo');
    patchButton.addEventListener('click',patchVideo,false);

    function patchVideo()
    {
        var videoTitle = document.getElementById('inputVideoTitle').value;
        var videoDescription = document.getElementById('inputVideoDescription').value;

        if (videoTitle != '' && videoDescription != '')
        {
            var xhr = new XMLHttpRequest();
            var vimeoURL = 'https://api.vimeo.com/videos/' + document.getElementById('vimeoVideoId').value;
            xhr.open('PATCH',vimeoURL , true);
            console.log("Start Patching to " + vimeoURL);
            xhr.setRequestHeader('Authorization', 'Bearer ' + '98f69d517107b9c27ce654570eb1ac42');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.responseType = 'json';
            xhr.onreadystatechange = function() {
                var status = xhr.status;
                if (status == 200) {
                    var responseFromVimeo = xhr.response;
                    if(responseFromVimeo){
                        console.log("data  " + responseFromVimeo);
                        document.getElementById('videoTitle').innerHTML = videoTitle;
                        document.getElementById('videoDescription').innerHTML = videoDescription;
                    }

                }
            };
            xhr.send(JSON.stringify({
                name: videoTitle,
                description: videoDescription
            }));
        }

    }

    function stopUpload(){
        if(document.getElementById('vimeoVideoId').value == ''){
            window.stop();
            //window.location.reload();
            updateProgress(0);
            console.log("Clear progress");
        }
        else if(document.getElementById('vimeoCurrentStatus').value == 'available')
        {
            console.log("Prepared to delete : " + document.getElementById('vimeoVideoId').value);
            var xhr = new XMLHttpRequest();
            var vimeoURL = 'https://api.vimeo.com/videos/' + document.getElementById('vimeoVideoId').value;
            xhr.open('DELETE',vimeoURL , true);
            console.log("Send to " + vimeoURL);
            xhr.setRequestHeader('Authorization', 'Bearer ' + '98f69d517107b9c27ce654570eb1ac42');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.responseType = 'json';
            xhr.onreadystatechange = function() {
                var status = xhr.status;
                if (status == 200) {
                    alert("OK");
                    document.getElementById('vimeoVideoId').value = '';
                }
            };
            xhr.send();
            document.getElementById('vimeoVideoId').value = '';
            document.getElementById('results').innerHTML = '';
            document.getElementById('status').innerHTML = '';
            document.getElementById('vid').innerHTML = '';
            document.getElementById('drop_zone').className = '';
            //window.location.reload();
            console.log("Completed Delete !!");

        }

        document.getElementById('action').className = 'action hidden';


    }

    function checkVideoAvailibility(e){
        console.log("Preparing XMLHttpRequest...");
        var xhr = new XMLHttpRequest();
        var vimeoURL = 'https://api.vimeo.com/videos/' + e.detail;
        xhr.open('GET',vimeoURL , true);
        console.log("Send to " + vimeoURL);
        xhr.setRequestHeader('Authorization', 'Bearer ' + '98f69d517107b9c27ce654570eb1ac42');
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.responseType = 'json';
        xhr.onreadystatechange = function(){
            var status = xhr.status;
            if(status == 200){
                var responseFromVimeo = xhr.response;
                if(responseFromVimeo){
                    console.log("Good Data = " + responseFromVimeo);
                    console.log("Status = " + responseFromVimeo.status);
                    if(responseFromVimeo.status == 'available'){
                        document.getElementById('vimeoCurrentStatus').value = responseFromVimeo.status;
                        console.log("HTML = " + responseFromVimeo.files[0].link);
                        var el = document.getElementById('vid');
                        var status = document.getElementById('status');

                        el.innerHTML = responseFromVimeo.embed.html;
                        status.innerHTML = '';
                        var statusSpan = document.createElement('span');
                        statusSpan.className = statusSpan.className + "label label-success";
                        statusSpan.id = 'currentStatus';
                        var statusText = document.createTextNode("Now " + responseFromVimeo.status);
                        statusSpan.appendChild(statusText);
                        status.appendChild(statusSpan);
                        document.getElementById('videoDetail').className ='row';
                        document.getElementById('stopUpload').innerHTML ="Delete Video";
                        document.getElementById('action').className = 'action';

                    }
                    else
                    {
                        console.log ("Current Status :" + responseFromVimeo.status);
                        document.getElementById('vimeoCurrentStatus').value = responseFromVimeo.status;
                        var status = document.getElementById('status');
                        status.innerHTML = '<span id="currentStatus" class="label label-warning">' + "Currently " + responseFromVimeo.status + '</span>';
                        var completedUpload = new CustomEvent("UploadingCompleted",{
                            'detail': e.detail
                        });
                        if(document.getElementById('vimeoVideoId').value != ''){
                            document.body.dispatchEvent(completedUpload);
                        }

                    }
                }

            }
        };

        xhr.send();
    }


    /**
     * Called when files are dropped on to the drop target. For each file,
     * uploads the content to Drive & displays the results when complete.
     */
    function handleFileSelect(evt) {
        evt.stopPropagation();
        evt.preventDefault();

        var progress = document.getElementById('progressElement');
        progress.className = "progress";

        document.getElementById('action').className = 'action';


        var files = evt.dataTransfer.files; // FileList object.
        var accessToken = '98f69d517107b9c27ce654570eb1ac42';
        var upgrade_to_1080 = document.getElementById("upgrade_to_1080").value;

        // Clear the results div
        var node = document.getElementById('results');
        while (node.hasChildNodes()) node.removeChild(node.firstChild);
        // Rest the progress bar
        updateProgress(0);

        var uploader = new MediaUploader({
            file: files[0],
            token: accessToken,
            upgrade_to_1080: upgrade_to_1080,
            onError: function(data) {

                var errorResponse = JSON.parse(data);
                message = errorResponse.error;
                var element = document.createElement("div");
                element.setAttribute('class', "alert alert-danger");
                element.appendChild(document.createTextNode(message));
                document.getElementById('results').appendChild(element);

            },
            onProgress: function(data) {

                updateProgress(data.loaded / data.total);

            },
            onComplete: function(videoId) {

                var url = "https://vimeo.com/"+videoId;
                // Update videoId
                document.getElementById('vimeoVideoId').value = videoId;

//                var a = document.createElement('a');
//                a.appendChild(document.createTextNode(url));
//                a.setAttribute('href',url);
//                var element = document.createElement("div");
//                element.setAttribute('class', "alert alert-success");
//                element.appendChild(a);
//                document.getElementById('results').appendChild(element);

                var completedUpload = new CustomEvent("UploadingCompleted",{
                    'detail': videoId
                });
                document.body.dispatchEvent(completedUpload);
                var progress = document.getElementById('progressElement');
                progress.className = "progress hidden";

                var dropZone = document.getElementById('drop_zone');
                dropZone.className = "hidden";


            }
        });
        uploader.upload();
    }
    /**
     * Dragover handler to set the drop effect.
     */
    function handleDragOver(evt) {
        evt.stopPropagation();
        evt.preventDefault();
        evt.dataTransfer.dropEffect = 'copy';
    }
    /**
     * Wire up drag & drop listeners once page loads
     */
    document.addEventListener('DOMContentLoaded', function () {
        var dropZone = document.getElementById('drop_zone');
        dropZone.addEventListener('dragover', handleDragOver, false);
        dropZone.addEventListener('drop', handleFileSelect, false);
    });

    /**
     * Updat progress bar.
     */
    function updateProgress(progress) {
        var dropZone = document.getElementById('drop_zone');

        progress = Math.floor(progress * 100);
        var element = document.getElementById('progress');
        element.setAttribute('style', 'width:'+progress+'%');
        element.innerHTML = progress+'%';
        if(progress == 100)
        {
            document.getElementById('action').className = 'action hidden';
        }

    }

</script>

