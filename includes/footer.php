      <div id="footer" class="cf">

        <div class="column three">
          <strong>Phone</strong>
          123-456-7890
        </div><!-- .column -->

        <div class="column three">
          <strong>Location</strong>
          123 some street<br>
          city, XX 00000
        </div><!-- .column -->

        <div class="column three last">

          <strong>Hours</strong>

          <?php

          date_default_timezone_set('America/Los_Angeles');

          include('includes/StoreHours.class.php');


          $hours = array(
              'mon' => array(),
              'tue' => array('13:00-21:00'),
              'wed' => array('13:00-21:00'),
              'thu' => array('13:00-21:00'),
              'fri' => array('16:00-22:30'),
              'sat' => array('16:00-22:30'),
              'sun' => array() // Closed all day
          );


          $exceptions = array(
              '12/25'  => array(),
              '1/1' => array()
          );

          $template = array(
              'open'           => "<strong class='open'>Yes, we're open! Today's hours are {%hours%}.</strong>",
              'closed'         => "<strong class='closed'>Sorry, we're closed now. Today's hours are {%hours%}.</strong>",
              'closed_all_day' => "<strong class='closed'>Sorry, we're closed today.</strong>",
              'separator'      => " - ",
              'join'           => " and ",
              'format'         => "g:ia", // options listed here: http://php.net/manual/en/function.date.php
              'hours'          => "{%open%}{%separator%}{%closed%}"
          );


          // Instantiate class
          $store_hours = new StoreHours($hours, $exceptions, $template);

          // Display full list of open hours (for a week without exceptions)
          echo '<table>';
          foreach ($store_hours->hours_this_week() as $days => $hours) {
              echo '<tr>';
              echo '<td>' . $days . '</td>';
              echo '<td>' . $hours . '</td>';
              echo '</tr>';
          }
          echo '</table>';

          // Call render method to output open / closed message
          $store_hours->render();


          ?>

        </div><!-- .column -->

      </div><!-- footer -->

      <small>&copy; <?php echo date('Y'); ?> <?php echo $companyName; ?></small>

    </div><!-- .content -->

  </div><!-- .wrapper -->



</body>
</html>
