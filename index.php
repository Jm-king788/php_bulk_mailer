<!DOCTYPE html>
<html>
  <head>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="text/javascript" src="custom.js"></script>
</head>
<body>
	<form action="email.php" method="post" enctype="multipart/form-data" id="eform">
    <div class="detail">
           <lable>Email</lable>
            <input type="email" name="email" id="email" class="email">
            <lable>Password</lable>
            <input type="password" name="password" id="password" class="p1">
        
 </div>
<div class="inp1" id="input">
 <label for="recipients">Recipients :</label>
  <textarea type="text" id="recipients" name="recipients" row="50" cols="50" required>(comma-separated) LIMIT 50</textarea>

</div>
   <div class="input-box">
    <lable>  From Name</lable>
      <input type="text" name="name" placeholder="" class="name1" id="name" required/>
	      <br>
        <lable> Subject </lable>
        <input type="text"  name="subject" placeholder="" class="sbj" id="subject" required>
    </div>
    <div>
      <span>Time Duration in Minutes</span>
      <input type="radio" id="three" class="three1"  name="time"  value="3">
      <label for="three">3</label>
      <input type="radio" id="five" class="five1"  name="time" value="5">
      <label for="five">5</label>
      <input type="radio" id="eight" class="eight1"  name="time"  value="8">
      <label for="eight">8</label>

    </div>
    <div class="input-box">
      <div class="input-box">
        <span> PDF to send </span>
       <input type="file" name="Pdf" id="Pdf">

      </div>
   <textarea  name="message" placeholder="Enter message" id="message" ></textarea>
    </div>
      <input type="submit" name="send" value="send"  style="width: 500px; margin-top: 10px">
    </form>
    <div id="show" class="s1">
      <table>
    <tr>
    <th>
    <output name="result" for=""></output>   </th>
    <th><div id="response"></div></th> <!--input data from  -->
  </tr>
    </table>

    </div>
  
</body>
<script src="tinymce/tinymce.min.js"></script>


  <script>

/////////////////////////////////////////////////////////////////////////////
    tinymce.init({
      selector: '#message',
      plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
      menubar: 'file edit view insert format tools table help',
      toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
      toolbar_sticky: true,
      //
      width: 600,
      height: 300,
      autosave_ask_before_unload: true,
      autosave_interval: '30s',
      autosave_prefix: '{path}{query}-{id}-',
      autosave_restore_when_empty: false,
      autosave_retention: '2m',
      image_advtab: true,
      link_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'http://www.codexqa.com' }
      ],
      image_list: [
        { title: 'My page 1', value: 'https://www.codexworld.com' },
        { title: 'My page 2', value: 'http://www.codexqa.com' }
      ],
      image_class_list: [
        { title: 'None', value: '' },
        { title: 'Some class', value: 'class-name' }
      ],
      importcss_append: true,
      file_picker_callback: (callback, value, meta) => {
        /* Provide file and text for the link dialog */
        if (meta.filetype === 'file') {
          callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
        }
    
        /* Provide image and alt text for the image dialog */
        if (meta.filetype === 'image') {
          callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
        }
    
        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === 'media') {
          callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
        }
      },
      templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
        { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
        { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
      ],
      template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
      template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
      height: 400,
      image_caption: true,
      quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
      noneditable_class: 'mceNonEditable',
      toolbar_mode: 'sliding',
      contextmenu: 'link image table',
      content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
  

       });
//////////////////////////////////////////////////////////////////////////////////



  </script>
</html>
