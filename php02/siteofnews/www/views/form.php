<form class="upload" action="/admin/addArticle" method="post" enctype="multipart/form-data">
    <h3>Размещение статьи:</h3>
    <p><input type="text" id="title" name="title" placeholder="Заголовок статьи" required></p>
    <p><textarea class="text" name="content" required><?php if ($data['article']->content && empty($data['success'])): echo $data['article']->content; endif; ?></textarea></p>
    <p><label for="preview">Картинка-превью:</label></p>
    <p><input type="file" id="preview" name="preview" required></p>
    <p><input type="submit" value="Добавить статью"></p>
    <!--  <label for="title">Название</label>-->
    <p><a href="/">На главную</a></p>
</form>