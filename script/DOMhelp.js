DOMhelp =
{
	lastSibling:function(node)
	{
	 var tempObj=node.parentNode.lastChild;
	 while(tempObj.nodeType!=1 && tempObj.previousSibling!=null)
	 {
	 tempObj=tempObj.previousSibling;
	 }
	 return (tempObj.nodeType==1)?tempObj:false;
	},
	firstSibling:function(node)
	{
	 var tempObj=node.parentNode.firstChild;
	 while(tempObj.nodeType!=1 && tempObj.nextSibling!=null)
	 {
	 tempObj=tempObj.nextSibling;
	 }
	 return (tempObj.nodeType==1)?tempObj:false;
	},
	
	getText:function(node)
	{
	 if(!node.hasChildNodes()){return false;}
	 var reg=/^\s+$/;
	 var tempObj=node.firstChild;
	 while(tempObj.nodeType!=3 && tempObj.nextSibling!=null ||reg.test(tempObj.nodeValue))
	 {
	 tempObj=tempObj.nextSibling;
	 }
	 return tempObj.nodeType==3?tempObj.nodeValue:false;
	},
	
	setText:function(node,txt)
	{
	 if(!node.hasChildNodes()){return false;}
	 var reg=/^\s+$/;
	 var tempObj=node.firstChild;
	 while(tempObj.nodeType!=3 && tempObj.nextSibling!=null ||reg.test(tempObj.nodeValue))
	 {
	 tempObj=tempObj.nextSibling;
	 }
	 if(tempObj.nodeType==3){tempObj.nodeValue=txt}else{return false;}
	},
	
	createLink:function(to,txt)
	{
	 var tempObj=document.createElement('a');
	 tempObj.appendChild(document.createTextNode(txt));
	 tempObj.setAttribute('href',to);
	 return tempObj;
	},
	createTextElm:function(elm,txt)
	{
	 var tempObj=document.createElement(elm);
	 tempObj.appendChild(document.createTextNode(txt));
	 return tempObj;
	},
	
	closestSibling:function(node,direction)
	{
	 var tempObj;
	 if(direction==-1 && node.previousSibling!=null)
	 {
	 tempObj=node.previousSibling;
	 while(tempObj.nodeType!=1 && tempObj.previousSibling!=null)
	 {
	 tempObj=tempObj.previousSibling;
	 }
	 }
	 else if(direction==1 && node.nextSibling!=null)
	 {
	 tempObj=node.nextSibling;
	 while(tempObj.nodeType!=1 && tempObj.nextSibling!=null)
	 {
	 tempObj=tempObj.nextSibling;
	 }
	 }
	 return tempObj.nodeType==1?tempObj:false;
	},
	
	initDebug:function()
	{
	 if(DOMhelp.debug){DOMhelp.stopDebug();}
	 DOMhelp.debug=document.createElement('div');
	 DOMhelp.debug.setAttribute('id',DOMhelp.debugWindowId);
	 document.body.insertBefore(DOMhelp.debug,document.body.firstChild);
	},

	setDebug:function(bug)
	{
		if(!DOMhelp.debug){DOMhelp.initDebug();}
		DOMhelp.debug.innerHTML+=bug+'\n';
	},
	
	stopDebug:function()
	{
		 if(DOMhelp.debug)
		 {
			 DOMhelp.debug.parentNode.removeChild(DOMhelp.debug);
			 DOMhelp.debug=null;
		 }
	}
		
}