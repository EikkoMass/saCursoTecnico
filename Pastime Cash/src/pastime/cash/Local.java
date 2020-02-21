/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package pastime.cash;

import com.sun.org.apache.bcel.internal.Constants;
import javax.swing.JOptionPane;


/**
 *
 * @author eric_massaneiro
 */
public class Local extends javax.swing.JFrame {
private static boolean setaDireitaApagada=false;
private static boolean setaEsquerdaApagada=false;
private static boolean jArena=false;
private static boolean jEmbraco=false;
private static boolean jExpoville=false;
private static boolean jFerroviaria=false;
private static boolean jMirante=false;
private static boolean jMuseu=false;
private static boolean jNadoVille=false;
private static boolean jPrincipe=false;
private static boolean jSmartFit=false;
private static boolean jSociedade=false;
private static boolean jTrilhas=false;
private static boolean jMonte=false;


    public void Setas(){
        if (setaEsquerdaApagada==false){
        setaLeft.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/seta esquerda.png")));
        }else {
        setaLeft.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/setaLeftC.png")));
        }
        if (setaDireitaApagada==false){
        setaRight.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/seta direita.png")));
        }else {
        setaRight.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/setaRightC.png")));
        }
    }

    public void Basquete(){
        if (ArmazenaUsuario.saldo>=180){
            embraco1.setVisible(true);
            jEmbraco=true;
            setaDireitaApagada=false;
            setaEsquerdaApagada=true;
            Setas();
        }else if (ArmazenaUsuario.saldo>=10){
            sociedade1.setVisible(true);
            jSociedade=true;
            setaDireitaApagada=true;
            setaEsquerdaApagada=true;
            Setas();
        }
    }
    
    public void Futebol(){
        if (ArmazenaUsuario.saldo>=320){
            embraco2.setVisible(true);
            jEmbraco=true;
            setaDireitaApagada=false;
            setaEsquerdaApagada=true;
            Setas();
        }else if(ArmazenaUsuario.saldo>=40 && ArmazenaUsuario.saldo<320){
            arena1.setVisible(true);
            jArena=true;
            setaDireitaApagada=false;
            setaEsquerdaApagada=true;
            Setas();
        }else if (ArmazenaUsuario.saldo>=10){
            sociedade1.setVisible(true);
            jSociedade=true;
            setaDireitaApagada=true;
            setaEsquerdaApagada=true;
            Setas();
        }
    }
    
    public void Volei(){
        if (ArmazenaUsuario.saldo>=180){
            embraco1.setVisible(true);
            jEmbraco=true;
            setaDireitaApagada=false;
            setaEsquerdaApagada=true;
            Setas();
        }else if (ArmazenaUsuario.saldo>=10){
            sociedade1.setVisible(true);
            jSociedade=true;
            setaDireitaApagada=true;
            setaEsquerdaApagada=true;
            Setas();
        }
    }
    
    public void Tenis(){
        embraco11.setVisible(true);
        setaDireitaApagada=true;
        setaEsquerdaApagada=true;
        Setas();
    }
    
    public void Natacao(){
        if (ArmazenaUsuario.saldo>=145){
            nadoVille1.setVisible(true);
            jNadoVille=true;
            setaDireitaApagada=false;
            setaEsquerdaApagada=true;
            Setas();
        }else{
            sociedade1.setVisible(true);
            setaDireitaApagada=true;
            setaEsquerdaApagada=true;
            Setas();
        }
    }
    
    public void Ciclismo(){
        if (ArmazenaUsuario.saldo>=75){
            smartFit1.setVisible(true);
            jSmartFit=true;
            setaDireitaApagada=false;
            setaEsquerdaApagada=true;
            Setas();
        }else {
            expoville1.setVisible(true);
            setaDireitaApagada=true;
            setaEsquerdaApagada=true;
            Setas();
        }
    }
    
    public void Corrida(){
        if (ArmazenaUsuario.saldo>=75){
            smartFit1.setVisible(true);
            jSmartFit=true;
            setaDireitaApagada=false;
            setaEsquerdaApagada=true;
            Setas();
        }else {
            expoville1.setVisible(true);
            jExpoville=true;
            setaDireitaApagada=false;
            setaEsquerdaApagada=true;
            Setas();
        }
    }
    
    public void Caminhada(){
        if (ArmazenaUsuario.saldo>=75){
            smartFit1.setVisible(true);
            jSmartFit=true;
            setaDireitaApagada=false;
            setaEsquerdaApagada=true;
            Setas();
        }else {
            expoville1.setVisible(true);
            jExpoville=true;
            setaDireitaApagada=false;
            setaEsquerdaApagada=true;
            Setas();
        }
    }
    
    public void Trilha(){
        trilhas2.setVisible(true);
        jTrilhas=true;
        setaDireitaApagada=false;
        setaEsquerdaApagada=true;
        Setas();
    }
    
    public void Passeio(){
        if(ArmazenaUsuario.saldo>=90){
            principe1.setVisible(true);
            jPrincipe=true;
            setaDireitaApagada=false;
            setaEsquerdaApagada=true;
            Setas();
        }else {
            museu1.setVisible(true);
            jMuseu=true;
            setaDireitaApagada=false;
            setaEsquerdaApagada=true;
            Setas();
        }
    }
    
    public void SelecionaHobbie(){
        if (Perfil.hobbieSelecionado.equals("Basquete")){
            txtNomeHobbie.setText(Perfil.hobbieSelecionado);
            Basquete();
            
        }else if (Perfil.hobbieSelecionado.equals("Futebol")){
            txtNomeHobbie.setText(Perfil.hobbieSelecionado);
            txtIcon.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/FutbaloGG.png")));
            Futebol();
        }else if (Perfil.hobbieSelecionado.equals("Vôlei")){
            txtNomeHobbie.setText(Perfil.hobbieSelecionado);
            txtIcon.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/VoleiGG.png")));
            Volei();
        }else if (Perfil.hobbieSelecionado.equals("Tênis")){
            txtNomeHobbie.setText(Perfil.hobbieSelecionado);
            txtIcon.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/TenisGG.png")));
            Tenis();
        }else if (Perfil.hobbieSelecionado.equals("Natação")){
            txtNomeHobbie.setText(Perfil.hobbieSelecionado);
            txtIcon.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/SwimGG.png")));
            Natacao();
        }else if (Perfil.hobbieSelecionado.equals("Ciclismo")){
            txtNomeHobbie.setText(Perfil.hobbieSelecionado);
            txtIcon.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/BikeGG.png")));
            Ciclismo();
        }else if (Perfil.hobbieSelecionado.equals("Corrida")){
            txtNomeHobbie.setText(Perfil.hobbieSelecionado);
            txtIcon.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/RunGG.png")));
            Corrida();
        }else if (Perfil.hobbieSelecionado.equals("Caminhada")){
            txtNomeHobbie.setText(Perfil.hobbieSelecionado);
            txtIcon.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/WalkGG.png")));
            Caminhada();
        }else if (Perfil.hobbieSelecionado.equals("Trilha")){
            txtNomeHobbie.setText(Perfil.hobbieSelecionado);
            txtIcon.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/TrilhaGG.png")));
            Trilha();
        }else if (Perfil.hobbieSelecionado.equals("Passeio")){
            txtNomeHobbie.setText(Perfil.hobbieSelecionado);
            txtIcon.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/RouteGG.png")));
            Passeio();
        }
    }
    
    public Local() {
        initComponents();
        arena1.setVisible(false);
        embraco1.setVisible(false);
        embraco11.setVisible(false);
        embraco2.setVisible(false);
        expoville1.setVisible(false);
        ferroviaria1.setVisible(false);
        mirante1.setVisible(false);
        museu1.setVisible(false);
        nadoVille1.setVisible(false);
        principe1.setVisible(false);
        smartFit1.setVisible(false);
        sociedade1.setVisible(false);
        trilhas2.setVisible(false);
        trilhaMonteCrista1.setVisible(false);
        SelecionaHobbie();
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        voltar = new javax.swing.JLabel();
        arena1 = new panels.Arena();
        embraco1 = new panels.Embraco();
        txtIcon = new javax.swing.JLabel();
        jPanel3 = new javax.swing.JPanel();
        txtNomeHobbie = new javax.swing.JLabel();
        setaLeft = new javax.swing.JLabel();
        setaRight = new javax.swing.JLabel();
        nadoVille1 = new panels.NadoVille();
        principe1 = new panels.Principe();
        smartFit1 = new panels.SmartFit();
        sociedade1 = new panels.Sociedade();
        embraco11 = new panels.Embraco1();
        embraco2 = new panels.Embraco2();
        expoville1 = new panels.Expoville();
        mirante1 = new panels.Mirante();
        museu1 = new panels.Museu();
        ferroviaria1 = new panels.Ferroviaria();
        trilhas2 = new panels.Trilhas();
        trilhaMonteCrista1 = new panels.TrilhaMonteCrista();
        fundo = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        getContentPane().setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        voltar.setIcon(new javax.swing.ImageIcon(getClass().getResource("/pastime/cash/Imagens/voltar pagina branco.png"))); // NOI18N
        voltar.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        voltar.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                voltarMouseClicked(evt);
            }
        });
        getContentPane().add(voltar, new org.netbeans.lib.awtextra.AbsoluteConstraints(10, 10, -1, -1));
        getContentPane().add(arena1, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 130, -1, -1));
        getContentPane().add(embraco1, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 130, -1, -1));

        txtIcon.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/basketGG.png"))); // NOI18N
        getContentPane().add(txtIcon, new org.netbeans.lib.awtextra.AbsoluteConstraints(180, 10, -1, -1));

        jPanel3.setBackground(new java.awt.Color(204, 204, 204));

        txtNomeHobbie.setFont(new java.awt.Font("Vrinda", 1, 24)); // NOI18N
        txtNomeHobbie.setForeground(new java.awt.Color(255, 255, 255));
        txtNomeHobbie.setText("Nome do Hobbie");
        jPanel3.add(txtNomeHobbie);

        getContentPane().add(jPanel3, new org.netbeans.lib.awtextra.AbsoluteConstraints(110, 70, 200, 40));

        setaLeft.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/setaleftC.png"))); // NOI18N
        setaLeft.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        setaLeft.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                setaLeftMouseClicked(evt);
            }
        });
        getContentPane().add(setaLeft, new org.netbeans.lib.awtextra.AbsoluteConstraints(110, 30, 20, -1));

        setaRight.setIcon(new javax.swing.ImageIcon(getClass().getResource("/icons/seta direita.png"))); // NOI18N
        setaRight.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        setaRight.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                setaRightMouseClicked(evt);
            }
        });
        getContentPane().add(setaRight, new org.netbeans.lib.awtextra.AbsoluteConstraints(290, 30, 20, -1));
        getContentPane().add(nadoVille1, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 130, -1, -1));
        getContentPane().add(principe1, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 130, 370, -1));
        getContentPane().add(smartFit1, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 130, -1, -1));
        getContentPane().add(sociedade1, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 130, 370, -1));
        getContentPane().add(embraco11, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 130, -1, -1));
        getContentPane().add(embraco2, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 130, -1, -1));
        getContentPane().add(expoville1, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 130, -1, -1));
        getContentPane().add(mirante1, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 130, -1, -1));
        getContentPane().add(museu1, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 130, 370, -1));
        getContentPane().add(ferroviaria1, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 130, -1, -1));
        getContentPane().add(trilhas2, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 130, -1, -1));
        getContentPane().add(trilhaMonteCrista1, new org.netbeans.lib.awtextra.AbsoluteConstraints(20, 130, -1, -1));

        fundo.setIcon(new javax.swing.ImageIcon(getClass().getResource("/pastime/cash/Imagens/Fundo local_1.png"))); // NOI18N
        getContentPane().add(fundo, new org.netbeans.lib.awtextra.AbsoluteConstraints(-30, 0, 430, 300));

        pack();
        setLocationRelativeTo(null);
    }// </editor-fold>//GEN-END:initComponents

    private void setaRightMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_setaRightMouseClicked
    if (setaDireitaApagada==false){
        if (Perfil.hobbieSelecionado.equals("Basquete")){
            
            if(jEmbraco==true){
                embraco1.setVisible(false);
                sociedade1.setVisible(true);
                jSociedade=true;
                jEmbraco=false;
                setaDireitaApagada=true;
                setaEsquerdaApagada=false;
                Setas();
            }else if (jSociedade==true){
                embraco1.setVisible(true);
                sociedade1.setVisible(false);
                jSociedade=false;
                jEmbraco=true;
                setaDireitaApagada=false;
                setaEsquerdaApagada=true;
                Setas();
            }
            
        }else if (Perfil.hobbieSelecionado.equals("Futebol")){
            
            if(jEmbraco==true){
                embraco2.setVisible(false);
                arena1.setVisible(true);
                jArena=true;
                jEmbraco=false;
                jSociedade=false;
                setaDireitaApagada=false;
                setaEsquerdaApagada=false;
                Setas();
                
            }else if (jArena==true){
                if (ArmazenaUsuario.saldo>=40){
                    arena1.setVisible(false);
                    sociedade1.setVisible(true);
                    jArena=false;
                    jSociedade=true;
                    setaDireitaApagada=true;
                    setaEsquerdaApagada=false;
                    Setas();
                }
            }
            
        }else if (Perfil.hobbieSelecionado.equals("Vôlei")){
        
            if(jEmbraco==true){
                embraco1.setVisible(false);
                sociedade1.setVisible(true);
                jSociedade=true;
                jEmbraco=false;
                setaDireitaApagada=true;
                setaEsquerdaApagada=false;
                Setas();
            }else if (jSociedade==true){
                embraco1.setVisible(true);
                sociedade1.setVisible(false);
                jSociedade=false;
                jEmbraco=true;
                setaDireitaApagada=false;
                setaEsquerdaApagada=true;
                Setas();
            }
        
        }else if (Perfil.hobbieSelecionado.equals("Natação")){
            if (jNadoVille==true){
                nadoVille1.setVisible(false);
                jNadoVille=false;
                sociedade1.setVisible(true);
                jSociedade=true;
                setaDireitaApagada=true;
                setaEsquerdaApagada=false;
                Setas();
            }
        
        }else if (Perfil.hobbieSelecionado.equals("Ciclismo")){
        
            if(jSmartFit==true){
                smartFit1.setVisible(false);
                jSmartFit=false;
                expoville1.setVisible(true);
                jExpoville=true;
                setaDireitaApagada=true;
                setaEsquerdaApagada=false;
                Setas();
            }
        
        }else if (Perfil.hobbieSelecionado.equals("Corrida")){
        
            if(jSmartFit==true){
                smartFit1.setVisible(false);
                jSmartFit=false;
                expoville1.setVisible(true);
                jExpoville=true;
                setaDireitaApagada=false;
                setaEsquerdaApagada=false;
                Setas();
            }else if(jExpoville==true){
                expoville1.setVisible(false);
                jExpoville=false;
                mirante1.setVisible(true);
                jMirante=true;
                setaDireitaApagada=true;
                setaEsquerdaApagada=false;
                Setas();
            }
        
        }else if (Perfil.hobbieSelecionado.equals("Caminhada")){
        
            if(jSmartFit==true){
                smartFit1.setVisible(false);
                jSmartFit=false;
                expoville1.setVisible(true);
                jExpoville=true;
                setaDireitaApagada=false;
                setaEsquerdaApagada=false;
                Setas();
            }else if(jExpoville==true){
                expoville1.setVisible(false);
                jExpoville=false;
                mirante1.setVisible(true);
                jMirante=true;
                setaDireitaApagada=true;
                setaEsquerdaApagada=false;
                Setas();
            }
        
        }else if (Perfil.hobbieSelecionado.equals("Trilha")){
        
            trilhas2.setVisible(false);
            jTrilhas=false;
            trilhaMonteCrista1.setVisible(true);
            jMonte=true;
            setaDireitaApagada=true;
            setaEsquerdaApagada=false;
            Setas();
        
        }else if (Perfil.hobbieSelecionado.equals("Passeio")){
        
            if(jPrincipe==true){
                principe1.setVisible(false);
                jPrincipe=false;
                museu1.setVisible(true);
                jMuseu=true;
                setaDireitaApagada=false;
                setaEsquerdaApagada=false;
                Setas();
            }else if(jMuseu==true){
                museu1.setVisible(false);
                jMuseu=false;
                ferroviaria1.setVisible(true);
                jFerroviaria=true;
                setaDireitaApagada=false;
                setaEsquerdaApagada=false;
                Setas();
            }else if(jFerroviaria==true){
                ferroviaria1.setVisible(false);
                jFerroviaria=false;
                mirante1.setVisible(true);
                jMirante=true;
                setaDireitaApagada=true;
                setaEsquerdaApagada=false;
                Setas();
            }
        
        }
    }    
    }//GEN-LAST:event_setaRightMouseClicked

    private void voltarMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_voltarMouseClicked
        Perfil perfil= new Perfil();
        dispose();
        perfil.setVisible(true);
    }//GEN-LAST:event_voltarMouseClicked

    private void setaLeftMouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_setaLeftMouseClicked
    if (setaEsquerdaApagada==false){
        if (Perfil.hobbieSelecionado.equals("Basquete")){
            
            if (jSociedade==true ){
                embraco1.setVisible(true);
                sociedade1.setVisible(false);
                jSociedade=false;
                jEmbraco=true;
                setaDireitaApagada=false;
                setaEsquerdaApagada=true;
                Setas();
            }
            
        }else if (Perfil.hobbieSelecionado.equals("Futebol")){
            
            if (jArena==true){
                arena1.setVisible(false);
                embraco2.setVisible(true);
                jEmbraco=true;
                jArena=false;
                setaDireitaApagada=false;
                setaEsquerdaApagada=true;
                Setas();
            }else if (jSociedade==true ){
                arena1.setVisible(true);
                sociedade1.setVisible(false);
                jSociedade=false;
                jArena=true;
                if (ArmazenaUsuario.saldo>=320){
                    setaDireitaApagada=false;
                    setaEsquerdaApagada=false;
                    Setas();
                }else {
                    setaDireitaApagada=false;
                    setaEsquerdaApagada=true;
                    Setas();
                }
            }
            
        }else if (Perfil.hobbieSelecionado.equals("Vôlei")){
        
            if (jSociedade==true ){
                embraco1.setVisible(true);
                sociedade1.setVisible(false);
                jSociedade=false;
                jEmbraco=true;
                setaDireitaApagada=false;
                setaEsquerdaApagada=true;
                Setas();
            }
        
        }else if (Perfil.hobbieSelecionado.equals("Natação")){
            
            if (jSociedade==true){
                nadoVille1.setVisible(true);
                jNadoVille=true;
                sociedade1.setVisible(false);
                jSociedade=false;
                setaDireitaApagada=false;
                setaEsquerdaApagada=true;
                Setas();
            }
        
        }else if (Perfil.hobbieSelecionado.equals("Ciclismo")){
        
            if (jExpoville==true){
                expoville1.setVisible(false);
                jExpoville=false;
                smartFit1.setVisible(true);
                jSmartFit=true;
                setaDireitaApagada=false;
                setaEsquerdaApagada=true;
                Setas();
            }
        
        }else if (Perfil.hobbieSelecionado.equals("Corrida")){
        
            if(jExpoville==true){
                expoville1.setVisible(false);
                jExpoville=false;
                smartFit1.setVisible(true);
                jSmartFit=true;
                setaDireitaApagada=false;
                setaEsquerdaApagada=true;
                Setas();
            }else if (jMirante==true){
                mirante1.setVisible(false);
                jMirante=false;
                expoville1.setVisible(true);
                jExpoville=true;
                if (ArmazenaUsuario.saldo>=75){
                    setaDireitaApagada=false;
                    setaEsquerdaApagada=false;
                    Setas();
                }else {
                    setaDireitaApagada=false;
                    setaEsquerdaApagada=true;
                    Setas();
                }
            }
        
        }else if (Perfil.hobbieSelecionado.equals("Caminhada")){
        
            if(jExpoville==true){
                expoville1.setVisible(false);
                jExpoville=false;
                smartFit1.setVisible(true);
                jSmartFit=true;
                setaDireitaApagada=false;
                setaEsquerdaApagada=true;
                Setas();
            }else if (jMirante==true){
                mirante1.setVisible(false);
                jMirante=false;
                expoville1.setVisible(true);
                jExpoville=true;
                if (ArmazenaUsuario.saldo>=75){
                    setaDireitaApagada=false;
                    setaEsquerdaApagada=false;
                    Setas();
                }else {
                    setaDireitaApagada=false;
                    setaEsquerdaApagada=true;
                    Setas();
                }
            }
        
        }else if (Perfil.hobbieSelecionado.equals("Trilha")){
        
            trilhas2.setVisible(true);
            jTrilhas=true;
            trilhaMonteCrista1.setVisible(false);
            jMonte=false;
            setaDireitaApagada=false;
            setaEsquerdaApagada=true;
            Setas();
        
        }else if (Perfil.hobbieSelecionado.equals("Passeio")){
        
            if(jMuseu==true){
                museu1.setVisible(false);
                jMuseu=false;
                principe1.setVisible(true);
                jPrincipe=true;
                setaDireitaApagada=false;
                setaEsquerdaApagada=true;
                Setas();
            }else if (jFerroviaria==true){
                ferroviaria1.setVisible(false);
                jFerroviaria=false;
                museu1.setVisible(true);
                jMuseu=true;
                if (ArmazenaUsuario.saldo>=90){
                    setaDireitaApagada=false;
                    setaEsquerdaApagada=false;
                    Setas();
                }else {
                    setaDireitaApagada=false;
                    setaEsquerdaApagada=true;
                    Setas();
                }
            }else if (jMirante==true){
                mirante1.setVisible(false);
                jMirante=false;
                ferroviaria1.setVisible(true);
                jFerroviaria=true;
                setaDireitaApagada=false;
                setaEsquerdaApagada=false;
                Setas();
            }
        
        }
    }
    }//GEN-LAST:event_setaLeftMouseClicked

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Local.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Local.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Local.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Local.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Local().setVisible(true);
            
            
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private panels.Arena arena1;
    private panels.Embraco embraco1;
    private panels.Embraco1 embraco11;
    private panels.Embraco2 embraco2;
    private panels.Expoville expoville1;
    private panels.Ferroviaria ferroviaria1;
    private javax.swing.JLabel fundo;
    private javax.swing.JPanel jPanel3;
    private panels.Mirante mirante1;
    private panels.Museu museu1;
    private panels.NadoVille nadoVille1;
    private panels.Principe principe1;
    private javax.swing.JLabel setaLeft;
    private javax.swing.JLabel setaRight;
    private panels.SmartFit smartFit1;
    private panels.Sociedade sociedade1;
    private panels.TrilhaMonteCrista trilhaMonteCrista1;
    private panels.Trilhas trilhas2;
    private javax.swing.JLabel txtIcon;
    private javax.swing.JLabel txtNomeHobbie;
    private javax.swing.JLabel voltar;
    // End of variables declaration//GEN-END:variables
}
