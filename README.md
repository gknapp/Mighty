<p style="margin: 0 auto; text-align: center;">
  <img src="Mighty/blob/master/public/images/mighty.png?raw=true" alt="mighty framework" />
</p>

[Zend Framework][1] is great, that's why I've used parts of it in Mighty.
However, Zend Framework is becoming increasingly heavy weight, and frankly 
turning into a framework only a J2EE coder could love.

For smaller projects I've created Mighty. Far simpler but still provides 
structure for you to build your web application.

I extracted this framework from a [small web site][2] I had to build recently. 
At present Mighty uses [Zend Layout][3], [Zend View][4] and [Zend Session][5] 
and doesn't enforce use of an ORM or particular templating system.

Requirements
------------

- PHP 5.3
- Zend Layout, View and Session *

\* Mighty is small and simple enough to refactor in your own in place of Zend.

[1]: http://framework.zend.com
[2]: http://joandgreg.info
[3]: http://framework.zend.com/manual/en/zend.layout.html
[4]: http://framework.zend.com/manual/en/zend.view.html
[5]: http://framework.zend.com/manual/en/zend.session.html