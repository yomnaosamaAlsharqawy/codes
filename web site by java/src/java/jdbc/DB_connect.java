/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jdbc;

/**
 *
 * @author yomna
 */
import java.sql.*;
import java.util.*;
import static jdbc.DBINFO.*;
public class DB_connect {
public static List<Integer>getAllValues(){
Connection c=null;
Statement s=null;
ResultSet r=null;
List<Integer>Seepages=new ArrayList();
try{
Class.forName("com.mysql.jdbc.Driver");
      c=DriverManager.getConnection(URL,USERNAME,PASSWORD);
      s=c.createStatement();
      String query="select * from transactions";  
      r=s.executeQuery(query);
      while(r.next()){
      int Seepage=r.getInt(2);
      Seepages.add(Seepage);
      }
      return Seepages;
}
catch (SQLException|ClassNotFoundException e) {
         return null;
   }
 finally{
        try{
            if(r!=null){
        r.close();
        }
        if(s!=null){
        s.close();
        }
        if(c!=null){
        c.close();
        }
        } 
        catch (SQLException e) {}
        }
}    
}
