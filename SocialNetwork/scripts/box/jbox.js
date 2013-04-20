function slideExample1(elementId, headerElement)
{
   var element = document.getElementById(elementId);
   if(element.up == null || element.down)
   {
      animate(elementId, 0, 20, 150, 0, 250, null);
      element.up = true;
      element.down = false;
      headerElement.innerHTML = 'vvv';
   }
   else
   {
      animate(elementId, 0, 20, 150, 130, 250, null);
      element.down = true;
      element.up = false;
      headerElement.innerHTML = '^^^';
   }
}

function slideExample2(elementId, headerElement)
{
   var element = document.getElementById(elementId);
   if(element.up == null || element.down)
   {
      animate(elementId, 20, 0, 0, 150, 250, null);
      element.up = true;
      element.down = false;
      headerElement.innerHTML = '&gt;<br />&gt;<br />&gt;';
   }
   else
   {
      animate(elementId, 20, 0, 130, 150, 250, null);
      element.down = true;
      element.up = false;
      headerElement.innerHTML = '&lt;<br />&lt;<br />&lt;';
   }
}

function slideExample3(elementId, headerElement)
{
   var element = document.getElementById(elementId);
   if(element.up == null || element.down)
   {
      animate(elementId, 0, 0, 20, 20, 250, null);
      element.up = true;
      element.down = false;
      headerElement.innerHTML = '+';
   }
   else
   {
      animate(elementId, 0, 0, 150, 150, 250, null);
      element.down = true;
      element.up = false;
      headerElement.innerHTML = '-';
   }
}

var slideElement = null;

function slideExample4(elementId, headerElement)
{
   
   slideElement = document.getElementById(elementId);
   if(slideElement.up == null || slideElement.down)
   {
      slideUpStep1();
      slideElement.up = true;
      slideElement.down = false;
      headerElement.innerHTML = '+';
   }
   else
   {
      slideDownStep1();
      slideElement.down = true;
      slideElement.up = false;
      headerElement.innerHTML = '-';
   }
}

function slideUpStep1()
{
   animate(slideElement.id, 0, 0, 20, 150, 250, slideUpStep2);
}

function slideUpStep2()
{
   animate(slideElement.id, 0, 0, 20, 20, 250, null);
}

function slideDownStep1()
{
   animate(slideElement.id, 0, 0, 20, 150, 250, slideDownStep2);
}

function slideDownStep2()
{
   animate(slideElement.id, 0, 0, 150, 150, 250, null);
}