<?php
/************************************************************************
  			Ferro/Canvas.php - Copyright filipo

                        This file is part of ferro.

    cms_blinkx is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    cms_blinkx is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with cms_blinkx.  If not, see <http://www.gnu.org/licenses/>.


/home/filipo/Projects/elocompany/prototipos/0.4/heading.php

This file was generated on Sat Feb 13 2010 at 12:12:27
The original location of this file is /home/filipo/Projects/elocompany/prototipos/0.4/includes/classes/Ferro/Canvas.php
**************************************************************************/


require_once 'WidgetView.php';
//require_once 'Header.php';
//require_once 'Footer.php';
require_once 'Menu.php';


/**
 * class Canvas
 */
class Canvas extends WidgetView
{

  /** Aggregations: */

  /** Compositions: */

   /*** Attributes: ***/

  /**
   * @access private
   */
  private $header;

  /**
   * @access private
   */
  private $footer;

  /**
   * @access private
   */
  private $menu;


  public function show(){
        echo '<li>Sou o Canvas. Me implemente!!';
  }



} // end of Canvas
?>
