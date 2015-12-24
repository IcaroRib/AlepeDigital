package com.example;

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/SubmitNameServlet")
public class SubmitNameServlet extends HttpServlet {

	@Override
	protected void doPost(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
		String name = req.getParameter("nome");
		
		PrintWriter out = new PrintWriter(resp.getOutputStream());
		out.println("<h1>Hey " + name + ". How's shit going?</h1>");
		out.close();
	}

}
