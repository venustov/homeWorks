<form class="upload" action="/add.php/addArticle" method="post" enctype="multipart/form-data">
  <h3>Размещение статьи:</h3>
  <p><input type="text" id="title" name="title" placeholder="Заголовок статьи"></p>
  <p><textarea class="text" name="content"></textarea></p>
  <p><label for="preview">Картинка-превью:</label></p>
  <p><input type="file" id="preview" name="preview"></p>
  <p><input type="submit" value="Добавить статью"></p>
  <!--  <label for="title">Название</label>-->
  <p><a href="/">На главную</a></p>
</form>