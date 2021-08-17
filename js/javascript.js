
window.addEventListener('load', function(e) 
{
    var formContainer = document.getElementsByClassName("form-container")[0];

    if (formContainer!==undefined || formContainer!=null)
    {
        formContainer.insertAdjacentHTML('beforeend',"<input type='button' class='submit-btn' orig='submit-search' value='" + document.getElementById('submit-search').innerHTML + "'></input>")
        document.getElementsByClassName('submit-btn')[0].addEventListener('click',function(){
            document.getElementById(this.getAttribute('orig')).click();
            var obj_iFrame = document.getElementsByName("resultbox")[0];
            if (obj_iFrame!==undefined || obj_iFrame!=null)
            {
                if (obj_iFrame.classList.contains('hidden'))
                {
                    obj_iFrame.classList.remove('hidden');
                    obj_iFrame.classList.add('visible');
                }
            }
        });
    };
});