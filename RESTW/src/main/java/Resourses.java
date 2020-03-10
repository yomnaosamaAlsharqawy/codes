
import java.util.List;
import javax.ws.rs.*;
import javax.ws.rs.core.MediaType;

@Path("res") // url /res
public class Resourses {
    @GET //method get
    @Produces(MediaType.TEXT_PLAIN) // returns plain text
     @Path("text") // url /text, full url become : http://localhost:8080/RESTW/restapp/res/text localhost:8080/project_name/appname/main_name/endpoint_name
    public String SayHello1() // function called when url accessed
    {
    return "hello text";
    }
    
    @GET
    @Produces(MediaType.TEXT_HTML)
    @Path("welcome/{user}")
    public String welcomeUser(@PathParam("user")String name){
        return "welcome "+name+ " to the Web Application.";
    }
    
    @GET
    @Produces(MediaType.APPLICATION_XML) // returns xml
    @Path("xml")
    public String SayHello2()
    {
        return "<?xml version=\"1.0\"?> <hello> Hello XML </hello>";
    }
    @GET
    @Produces(MediaType.TEXT_HTML) // return html
    @Path("html")
    public String SayHello3()
    {
        return"<html> <body> <h1> hello html</h1> </body> </html>";
    }
    
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    @Path("param/{name}") // taling parameters from url
    public String SayHello4(@PathParam("name")String n) // use parameters in accessing method
    {
        return "Hello "+n;
    }
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    @Path("sum/{a}+{b}") // when taking parameters
    public String sum(@PathParam("a")int a,@PathParam("b")int b)
    {
        return "sum ="+(a+b);
                
    }
    
    @GET
    @Produces(MediaType.TEXT_PLAIN)
    @Path("mul/{a}*{b}*{z}") // when taking parameters
    public int mul(@PathParam("a")int a,@PathParam("b")int b, @PathParam("z")int c)
    {
        return a*b*c;
                
    }
    
    @GET
    @Produces(MediaType.APPLICATION_XML)
    @Path("obj")
    public RestApp obj()
    {
        RestApp r =new RestApp();
        r.setStudent("Ahmed");
        r.setId(50);
        return r; // returns xml object .. requires to add @XmlRootElement to RestApp.java
    }
    
    @GET
    @Produces(MediaType.APPLICATION_XML)
    @Path("list")
    public List<RestApp> getlist()
    {
        Data d=new Data();
        return d.retrive();
    }
    @POST //post request .. user PostMan or Insomnia to make the post request
    @Consumes(MediaType.APPLICATION_XML) // takes xml as input
    @Path("create")
    /*
        <restApp>
            <id>3</id>
            <student>Yomna</student>
        </restApp>
    */
    public List<RestApp> CreateObj (RestApp r)
    {
        Data d=new Data();
        getlist();
        d.create(r);
        System.out.println(d.retrive());
        return d.retrive();
    }
}
