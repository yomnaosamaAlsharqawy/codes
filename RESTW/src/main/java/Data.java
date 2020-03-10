
import java.util.ArrayList;
import java.util.List;


// class just for storing data in list "l"
public class Data {
    List<RestApp> l;
    Data()
    {
        l=new ArrayList<>();
        RestApp r1=new RestApp("mohamed",20);
        RestApp r2=new RestApp();
        r2.setStudent("ali");
        r2.setId(30);
        l.add(r1);
        l.add(r2);
    }
    public List<RestApp> retrive()
    {
    return l;
    }
    public void create(RestApp r)
    {
        l.add(r);
    }
    
}
