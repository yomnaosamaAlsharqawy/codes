
import javax.ws.rs.ApplicationPath;
import javax.ws.rs.core.Application;
import javax.xml.bind.annotation.XmlRootElement;
@XmlRootElement // to output xml object
@ApplicationPath("restapp") // application name .. url /restapp
public class RestApp extends Application{ // must extends an application to run
    // main class methods & setter & getter
    @Override
    public String toString() {
        return "RestApp{" + "Student=" + Student + ", id=" + id + '}';
    }
    private String Student;
    private int id;

    public String getStudent() {
        return Student;
    }

    public int getId() {
        return id;
    }

    public void setStudent(String Student) {
        this.Student = Student;
    }

    public void setId(int id) {
        this.id = id;
    }

    public RestApp(String Student, int id) {
        this.Student = Student;
        this.id = id;
    }

    public RestApp() {
    }
}
