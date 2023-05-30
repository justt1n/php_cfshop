<style>
    
    /* Style the tab */
    .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
    }

    /* Change background color of buttons on hover */
    .tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */
    .tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }
</style>


<div class="tab">
    <button class="tablinks" onclick="openTab(event, 'EditProduct')">Edit Product</button>
    <button class="tablinks" onclick="openTab(event, 'AddProduct')">Add Product</button>
    <button class="tablinks" onclick="openTab(event, 'Tokyo')">Tokyo</button>
</div>

<!-- Tab content -->
<div id="EditProduct" class="tabcontent">
    <h3>London</h3>
    <p>London is the capital city of England.</p>
</div>

<div id="AddProduct" class="tabcontent">
    <form action='' class='form'>
        <p class='field required'>
            <label class='label required' for='name'>TÊN SẢN PHẨM</label>
            <input class='text-input' id='name' name='name' required type='text' placeholder='Ô Long'>
        </p>
        <div class='field'>
            <label class='label'>Phân loại</label>
            <ul class='options'>
                <li class='option'>
                    <input class='option-input' id='option-0' name='option' type='radio' value='tea'>
                    <label class='option-label' for='option-0'>Trà</label>
                </li>
                <li class='option'>
                    <input class='option-input' id='option-1' name='option' type='radio' value='Coffee'>
                    <label class='option-label' for='option-1'>Cafe</label>
                </li>
                <li class='option'>
                    <input class='option-input' id='option-2' name='option' type='radio' value='Other'>
                    <label class='option-label' for='option-2'>Khác</label>
                </li>
            </ul>
        </div>
        <p class='field'>
            <label class='label' for='about'>Mô tả</label>
            <textarea class='textarea' cols='50' id='about' name='description' rows='4'></textarea>
        </p>
        <p class='field half'>
            <label class='label' for='price'>Giá</label>
            <input class='number' id='price' name='price' type='phone'>
        </p>
        <p class='field half'>
            <input class='button' type='submit' value='Send'>
        </p>
    </form>

</div>

<div id="Tokyo" class="tabcontent">
    <h3>Tokyo</h3>
    <p>Tokyo is the capital of Japan.</p>
</div>

<script>
    function openTab(evt, cityName) {
        // Declare all variables
        var i, tabcontent, tablinks;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }

        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>