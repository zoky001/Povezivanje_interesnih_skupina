{if isset($smarty.post.salji)}
    Pomak vremena: {$vrijeme}
{else}
    <form action=vrijeme.php method="POST">
      <input type="submit" name='salji' value='{$salji}'>
    </form>
{/if}
