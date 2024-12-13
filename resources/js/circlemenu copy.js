
 // Define a "circle menu type1" class
 class circlemenu {
    currentdiv;
    center_icon;
    constructor(mainparent) {
        this.firstlevel_items = $("div.ring > a,div.ring >div");
        this.currentdiv=$(".ring");
        this.center_icon=[$("div.center").attr("class")];
       
    }
    reset()
    {
        if(this.currentdiv.hasClass("ring")==false){
        this.currentdiv.addClass('menuItem');
        this.currentdiv.addClass("fa "+ this.currentdiv.attr("data-icon")+" fa-2x");
        }

        this.firstlevel_items = $("div.ring > a,div.ring >div");

        this.currentdiv=$(".ring");  
       
        this.switchmenu(this.currentdiv, this.firstlevel_items);
        this.change_center_icon(null,"yes");
        this.center_icon=[$("div.center").attr("class")];
//this.arrangeitem();
    }

    arrangeitem(items=null) {
        if(items===null)
        {
            items=this.firstlevel_items;

        }else if(this.currentdiv.hasClass("ring")==false)
        {
            console.log("arrangeitem");
            console.log(this.currentdiv.attr("class"));
           // this.currentdiv.removeAttr("class ");
           this.currentdiv.removeClass("menuItem fa-2x");

            this.currentdiv.css("visibility" , "hidden");

        }
        for(var i = 0, l = items.length; i < l; i++) {
            items[i].style.left = (50 - 35*Math.cos(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
            
            items[i].style.top = (50 + 35*Math.sin(-0.5 * Math.PI - 2*(1/l)*i*Math.PI)).toFixed(4) + "%";
            items[i].style.visibility = "visible";
           }
    }
    switchmenu(parent,item){
        if(parent!=null)
        {
                    this.currentdiv=parent;
        }
    else
    {
            this.currentdiv=this.currentdiv.parent();
    }

      this.hide_items();
       
        this.arrangeitem(item);
        console.log("switchmenu");
        console.log(this.currentdiv);
        // if(this.currentdiv.hasClass("ring")==true)
        //     this.change_center_icon();
       
    }
    returnback()
    {
        if(this.currentdiv.hasClass("ring")==false)
        {
         //this.currentdiv.addClass('menuItem');
        //this.currentdiv.addClass("fa "+ this.currentdiv.attr("data-icon")+" fa-2x");
        this.currentdiv=this.currentdiv.parent();
        let item=this.currentdiv.children();
        this.switchmenu(this.currentdiv, item);
        }
       
    }
    hide_items()
    {
        let items = $(".ring").find ("a,div" );
        $( "div.ring" ).find( items ).css( "visibility", "hidden" );
        //$(".close").show();
    }
    change_center_icon(newclass=null,reset=null)
    {
        if( reset=="yes"){
            $("div.center").attr("class");
            $("div.center").attr("class",this.center_icon[0]); 
            this.center_icon.length = 0;
            return;          
        }
        if(newclass==null ){

            $("div.center").attr("class");
            $("div.center").attr("class",this.center_icon.pop());
        }
        
    else
    {
        newclass=newclass.replace("menuItem", "center")
        this.center_icon.push($("div.center").attr("class"));
        $("div.center").attr("class");
        $("div.center").attr("class",newclass);
    }
        
    }
    // show_items()
    // {
    //     console.log("show_items=>");
    //     console.log(this.currentdiv);
    //     this.currentdiv.children().css( "visibility", "visible" );
    //     this.currentdiv.addClass('menuItem');
    //     this.currentdiv.addClass("fa "+$("div.center").attr("data-icon")+" fa-2x");
    //     $("div.center").addClass("center fa fa-th fa-2x");
    //     $("div.center").attr("data-icon","fa-th");
    //     //this.currentdiv=this.currentdiv.parent();

    // }
};
export default circlemenu;
window.circlemenu = circlemenu;

