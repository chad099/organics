<?php
namespace App;

class Util {

  public static function userBadge($total)
  {
    if($total == 'admin')
      return Util::badgeHtml()['admin'];
      
    if($total == 0)
      return Util::badgeHtml()['member'];
    switch($total)
    {
      case $total >= 1 && $total < 5:
          return Util::badgeHtml()['contributor'];
          break;
      case $total >= 5 && $total <= 15:
          return Util::badgeHtml()['activist'];
          break;
      case $total >= 15 && $total <= 25:
          return Util::badgeHtml()['sage'];
          break;
      case $total >= 25 && $total <= 50:
          return Util::badgeHtml()['sensei'];
          break;
      case $total >= 50 && $total <= 100:
          return Util::badgeHtml()['eco-hero'];
          break;
      case $total > 100:
          return Util::badgeHtml()['enlightened'];
          break;
      default:
          return  Util::badgeHtml()['member'];
          break;
    }
  }

  public static function badgeHtml()
  {
    return [
      'member'=>'<button class="badge2" type="submit"><img src="/assets/front/images/Badges-icon.png">MEMBER</button>',
      'contributor'=>'<button class="badge3" type="submit"><img src="/assets/front/images/Badges-icon.png">CONTRIBUTER</button>',
      'activist'=>'<button class="badge1" type="submit"><img src="/assets/front/images/Badges-icon.png">ACTIVIST</button>',
      'sage'=>'<button class="badge6" type="submit"><img src="/assets/front/images/Badges-icon.png">SAGE</button>',
      'sensei'=>'<button class="badge5" type="submit"><img src="/assets/front/images/Badges-icon.png">SENSEI</button>',
      'eco-hero'=>'<button class="badge4" type="submit"><img src="/assets/front/images/Badges-icon.png">ECO-HERO</button>',
      'enlightened'=>'<button class="badge7" type="submit"><img src="/assets/front/images/Badges-icon.png">ENLIGHTENED</button>',
      'admin'=>'<button class="badge7" type="submit"><img src="/assets/front/images/Badges-icon.png">MODERATOR</button>'
    ];
  }
}
?>
