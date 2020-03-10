<%-- 
    Document   : get_data_to_update
    Created on : Apr 26, 2018, 8:52:51 AM
    Author     : yomna
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.util.*"%>
<%@page import="static jdbc.DB_connect.*"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="refresh" content="50">
        <title>Update Operation</title>
    </head>
    <body>
        <h2>Update an existing Record</h2>
        <form action="Update_Record" method="post">
            Select Seepage:<select name="Seepage">
                <%
                    List<Integer> Seepages=getAllValues();
                    for(int Seepage:Seepages){
                    out.println("<option>"+Seepage+"</option>");
                    
                    }
                    
                    %>
            </select>
            <br>
           Enter Oppress:<input name='oppress' size='50'>
            <br><br>
            Enter Cushion:<input name='cushion' size='50'>
            <br><br>
            <input type='submit' value='Update Record'>
            <br><br>
            
        </form>
    </body>
</html>
