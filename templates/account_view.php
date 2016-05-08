<!--new note form-->
<div class="row col-md-7">
  <form id="submitNote">
    <fieldset class="form-group">
      <input type="text" class="form-control" name="title" id="titleInput" placeholder="Title">
    </fieldset>
    <fieldset class="form-group">
      <textarea class="form-control" rows="3" name="content" id="contentInput" placeholder="Content"></textarea>
    </fieldset>
    <button type="submit" class="btn btn-primary">Create new</button>
    <input type="hidden" name="action" value="submit" />
  </form>
</div>

<!--notes-->
<div id="notesContent" class="col-lg">

  <?php
foreach ($notes as $note)
{
    // render the mustache template
    echo $tpl->render(array('ID' => $note->getId(), 'TITLE' => $note->getTitle(), 'CONTENT' => $note->getContent()));
}
?>

</div>