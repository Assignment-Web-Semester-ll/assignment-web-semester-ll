<style>
    /** SPINNER CREATION **/
    .loader {
        position: relative;
        text-align: center;
        margin: 15px auto 35px auto;
        z-index: 9999;
        display: block;
        width: 80px;
        height: 80px;
        border: 10px solid rgba(0, 0, 0, .3);
        border-radius: 50%;
        border-top-color: #000;
        animation: spin 1s ease-in-out infinite;
        -webkit-animation: spin 1s ease-in-out infinite;
    }

    @keyframes  spin {
        to {
            -webkit-transform: rotate(360deg);
        }
    }

    @-webkit-keyframes spin {
        to {
            -webkit-transform: rotate(360deg);
        }
    }


    /** MODAL STYLING **/

    /* .modal-content {
    border-radius: 0px;
    box-shadow: 0 0 20px 8px rgba(0, 0, 0, 0.7);
    }

    .modal-backdrop.show {
    opacity: 0.75;
    } */

    .loader-txt {
        p {
            font-size: 13px;
            color: #666;
            small {
            font-size: 11.5px;
            color: #999;
            }
        }
    }
</style>

<!-- Modal -->
<div class="modal fade" id="loadMe" tabindex="-1" role="dialog" aria-labelledby="loadMeLabel">
    <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <div class="modal-body text-center">
        <div class="loader"></div>
        <div clas="loader-txt">
            <p>Loading...</p>
        </div>
        </div>
    </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\assignment-web-semester-ll\assignment-web-semester-ll\resources\views/commoncomponent/loading.blade.php ENDPATH**/ ?>