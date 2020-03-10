<%-- 
    Document   : delete
    Created on : May 3, 2018, 8:32:54 AM
    Author     : yomna
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.util.*"%>
<%@page import="static jdbc.DB_connect.*"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>delete record</title>
    </head>
    <body>
        <h2>Delete an Existing Record</h2>
    </body>
    <form action='DeleteRecord' method='post'>
        Select Seepage:<select name='Seepage'>
            <%
                    List<Integer> Seepages=getAllValues();
                    for(int Seepage:Seepages){
                    out.println("<option>"+Seepage+"</option>");
                    
                    }
                    
                    %>
            </select>
        <br><br>
            <input type='submit' value='Delete Record'>
            <br><br>
    </form>
</html>
