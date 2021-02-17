<?php
  require ("page.php");

  class AboutPage extends Page
  {

    public function Display()
    {
      echo "<html>\n<head>\n";
      $this->DisplayTitle();
      $this->DisplayKeywords();
      $this->DisplayStyles();
      echo "</head>\n<body>\n";
      $this->DisplayHeader();
      $this->DisplayMenu($this->buttons);
      echo $this->content;
      $this->DisplayFooter();
      echo "</body>\n</html>\n";
    }
  }

  $services = new AboutPage();

  $services -> content ="<p>You can download the history and informatión of our company here.</p>";

  $services->Display();
?>
