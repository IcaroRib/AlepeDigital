import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;


public class DBProposicoes {
	
private java.sql.Connection conn;
	
	public int procurarProposicao(Proposicao proposicao) throws SQLException{
		
		int idProposicao = 0;		
		String sql = "SELECT idProposicao FROM proposicao WHERE numeroProposicao = '" + proposicao.getNumero() + "')";
		Statement st = conn.createStatement();
		System.out.println(sql);
		ResultSet rs = st.executeQuery(sql);
		while (rs.next()) {
			idProposicao = rs.getInt("idProposicao");
			return idProposicao;
		}	
		
		return idProposicao;
		
	}
	
	public int procurarLei(Proposicao proposicao) throws SQLException{
		
		int idProposicao = 0;
		String sql = "SELECT idProposicao FROM proposicao INNER JOIN lei_ordinaria ON Proposicao_idProposicao = idProposicao" +
					" WHERE numeroProposicao = '" + proposicao.getNumero() + "')";
		Statement st = conn.createStatement();
		System.out.println(sql);
		ResultSet rs = st.executeQuery(sql);
		while (rs.next()) {
			idProposicao = rs.getInt("idProposicao");
			return idProposicao;
		}	
		
		return idProposicao;
		
	}
	
	public int procurarStatus (Proposicao proposicao) throws SQLException{
		
		int idStatus = 0;
		String sql = "SELECT idStatus FROM status WHERE localizacao = '" + proposicao.getLocalizacao() 
				+ "' and situacaoTramite = '" + proposicao.getSituacaoTramite()	+ "')";
		Statement st = conn.createStatement();
		System.out.println(sql);
		ResultSet rs = st.executeQuery(sql);
		while (rs.next()) {
			idStatus = rs.getInt("idStatus");
			return idStatus;
		}	
		
		return idStatus;
		
	}
	
	public int	inserirStatus(Proposicao proposicao) throws SQLException{
		
		int idStatus = this.procurarStatus(proposicao);		
		
		if (idStatus != 0){
			return idStatus;
		}
		
		String sql = "INSERT INTO status (situacaoTramite, localizacao) VALUES (" 
					+ "'" + proposicao.getSituacaoTramite() + "'"
					+ "'" + proposicao.getLocalizacao() + "')";
		Statement st = conn.createStatement();
		System.out.println(sql);
		idStatus = st.executeUpdate(sql,1);
		
		return idStatus;
		
	}
	
	public int inserirProposicao(Proposicao proposicao) throws SQLException{
		
		int idStatus = this.inserirStatus(proposicao);
		
		String sql = "INSERT INTO proposicao (texto, justificativa, resumo, dataPublicacao, numeroProposicao, idStatus, idDeputado) VALUES ("
				     + "'" + proposicao.getDescricaoCompleta()  + "', "
				     + "'" + proposicao.getJustificativa() + "', "
				     + "'" + proposicao.getDescricaoCurta() + "', "
				     + "'" + proposicao.getDataPublicacao() + "', "
				     + "'" + proposicao.getNumero() + "', "
				     + idStatus + ","
				     + proposicao.getIdAutor() + ")";
		Statement st = conn.createStatement();
		System.out.println(sql);
		int idProposicao = st.executeUpdate(sql,1);
		proposicao.setIdProposicao(idProposicao);
		
		if (proposicao.getTipoProp().equals("Lei Ordinária")){
			idProposicao = this.InserirLei(proposicao);
		}
		
		return idProposicao;
	}

	private int InserirLei(Proposicao proposicao) throws SQLException {
		
		String sql = "INSERT INTO proposicao (Proposicao_idProposicao, resultadoFinal, ) VALUES ("
			     + "'" + proposicao.getIdProposicao()  + "', "
			     + "'" + proposicao.getRedacaoFinal() + "', "
			     + "'" + proposicao.getDescricaoCurta() + "', "
			     + "'" + proposicao.getDataPublicacao() + "', "
			     + "'" + proposicao.getNumero() + "', "
			     + proposicao.getIdAutor() + ")";
		Statement st = conn.createStatement();
		System.out.println(sql);
		int idProposicao = st.executeUpdate(sql,1);
		proposicao.setIdProposicao(idProposicao);		
		
		return 0;
	}

}
