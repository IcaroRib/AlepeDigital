import java.sql.DriverManager;
import java.sql.SQLException;


public class Connection {
	
	private static String url = "jdbc:mysql://localhost/alepedigital";
	private static String username = "root";
	private static String password = "JME.megasin-02";
	
static public java.sql.Connection connect() throws ClassNotFoundException{
		
		java.sql.Connection conexao = null;
		try {
			Class.forName("com.mysql.jdbc.Driver");
			conexao = DriverManager.getConnection(url, username, password);
		}
		
		catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		return conexao;
		
	}
	
	public static boolean desconnect() throws ClassNotFoundException { 
		
		try { 
			Connection.connect().close(); 
			return true; 
		} 
		
		catch (SQLException e) { 
			
			return false; 
			
		} 
		
	} 

	
}