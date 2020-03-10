/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package jdbc;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.PreparedStatement;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;
import static jdbc.DBINFO.*;

/**
 *
 * @author yomna
 */
@WebServlet(name = "DisplayAllRecord", urlPatterns = {"/DisplayAllRecord"})
public class DisplayAllRecord extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet DisplayAllRecord</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Servlet DisplayAllRecord at " + request.getContextPath() + "</h1>");
            out.println("</body>");
            out.println("</html>");
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
         Connection c=null;
         Statement s=null;
         ResultSet r=null;
          try(PrintWriter out=response.getWriter()){
         Class.forName("com.mysql.jdbc.Driver");
         c=DriverManager.getConnection(URL,USERNAME,PASSWORD);
         String sql="select * from transactions";
            s=c.createStatement();
           r=s.executeQuery(sql);
           out.println("<table border='1' width='75%'>");
           out.println("<th>Oppress</th><th>Seepage</th><th>Cushion</th>");
           while(r.next()){
           String O=r.getString(1);
           int S=r.getInt(2);
           String C=r.getString(3);
           out.println("<tr>");
           out.println("<td>"+O+"</td>");
           out.println("<td>"+S+"</td>");
           out.println("<td>"+C+"</td>");
           out.println("</tr>");
           }
           out.println("</table>");
          } 
          catch (SQLException|ClassNotFoundException e) {
         try(PrintWriter out=response.getWriter()){
           out.println("Error:"+e.getMessage());
        }  }
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

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        processRequest(request, response);
    }
    

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
